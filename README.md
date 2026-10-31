![Banner](https://banners.beyondco.de/ClearPass.png?theme=dark&packageManager=composer+require&packageName=spkm%2Fclear-pass&pattern=architect&style=style_2&description=&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

[![Tests](https://github.com/spkm/clear-pass/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/spkm/clear-pass/actions/workflows/tests.yml?branch=main)
[![Latest version](https://img.shields.io/packagist/v/spkm/clear-pass)](https://packagist.org/packages/spkm/clear-pass)
[![PHP version](https://img.shields.io/packagist/php-v/spkm/clear-pass)](https://packagist.org/packages/spkm/clear-pass)

A Laravel package for the [Aruba ClearPass](https://www.hpe.com/us/en/aruba-clearpass.html) REST API, built with
[Saloon](https://docs.saloon.dev). It has a typed model, a request and an Eloquent-style query builder for every
service in ClearPass's API Explorer, grouped as the explorer groups them: `apiOperations()`,
`certificateAuthority()`, `endpointVisibility()`, `enforcementProfile()`, `globalServerConfiguration()`,
`guestActions()`, `guestConfiguration()`, `identities()`, `insight()`, `integrations()`,
`localServerConfiguration()`, `logs()`, `platformCertificates()`, `policyElements()`, `sessionControl()` and
`toolsAndUtilities()`.

```php
use spkm\ClearPass\Facades\ClearPass;

$guest = ClearPass::identities()->guestUsers()->create([
    'username' => 'visitor@example.com',
    'password' => 'a-strong-password',
    'role_id' => ClearPass::policyElements()->roles()->findByName('[Guest]')->id,   // roles are your server's own
    'expire_time' => now()->addDays(2),
    'sponsor_name' => 'Reception',
]);

$expiring = ClearPass::identities()->guestUsers()
    ->where('sponsor_profile', 'API')
    ->where('expire_time', '<', now()->addDay())
    ->orderBy('expire_time')
    ->get();

foreach (ClearPass::sessionControl()->activeSessions()->where('ssid', 'Guest')->lazy() as $session) {
    // one page of 100 at a time
}
```

## Requirements

- PHP 8.5
- Laravel 12.39 or higher, or Laravel 13
- An API client on your ClearPass server (Administration > API Services > API Clients) using the client
  credentials grant, with an operator profile that allows the APIs you need. ClearPass answers a call the client's
  profile doesn't allow with 403.

## Installation

```bash
composer require spkm/clear-pass
php artisan clearpass:install
```

The install command publishes `config/clearpass.php`. Set the server and the client in `.env`:

```dotenv
CLEAR_PASS_BASE_URL=https://clearpass.example.com
CLEAR_PASS_ID=your-client-id
CLEAR_PASS_SECRET=your-client-secret
```

## Upgrading from version 1

Code written for version 1 keeps working, apart from the PHP and Laravel minimums above and the config file's
publish tag (`clearpass-config`, published by `clearpass:install`). The request classes version 1 shipped stay where
they were, taking the same arguments, and `DTOs\GuestUser` still describes a guest account to create or change, so
`ClearPass::send(new CreateGuestUserRequest($guestUser))` and `ClearPass::send(new
GetGuestUserByUsernameRequest($username))->json()` do what they did. Those classes are deprecated in favour of the
ones under `Requests\Identities\GuestUser`, `Requests\PolicyElements\Role` and `Requests\ApiOperations`, and of the
resources below, which return models rather than arrays:

| Version 1 | Now |
|---|---|
| `Requests\Identities\GetGuestUsersRequest` | `Requests\Identities\GuestUser\GetGuestUsersRequest`, or `ClearPass::identities()->guestUsers()->get()` |
| `Requests\Identities\GetGuestUserByUsernameRequest` | `Requests\Identities\GuestUser\GetGuestUserByUsernameRequest`, or `guestUsers()->findByUsername()` |
| `Requests\Identities\CreateGuestUserRequest(DTOs\GuestUser)` | `Requests\Identities\GuestUser\CreateGuestUserRequest(array|JsonSerializable)`, or `guestUsers()->create()` |
| the other `Requests\Identities\*GuestUser*` classes | the same names under `Requests\Identities\GuestUser`, taking the account's id or username first |
| `Requests\PolicyElements\Get{Roles,Role,RoleByName}Request` | the same names under `Requests\PolicyElements\Role`, or `ClearPass::policyElements()->roles()` |
| `Requests\ApiOperations\GetToken{Info,Privileges}Request` | `Requests\ApiOperations\TokenInfo\GetTokenInfoRequest` and `TokenPrivileges\GetTokenPrivilegesRequest` |
| `DTOs\GuestUser` | `Data\Identities\GuestUser`, the model guest account requests return and accept |

Other changes:

- The connector fetches its token before its first request rather than when it is built, and caches it (encrypted,
  in the application's cache) until a minute before it expires. A 401 is answered by fetching a new token and
  sending the request once more.
- `Response::dto()` returns a model (or a `Collection` of models) for every request, and throws a
  [`ClearPassApiException`](#errors) for an error status; it returned `null` before.
- `ClearPass::paginate()` pages by `offset` and `limit` until a page is short or has no `next` link; version 1
  compared the offset with the count.
- The `Traits\TransformsGuestUser` trait is gone: `DTOs\GuestUser` serialises itself (`jsonSerialize()`).

## Usage

### Two ways to call ClearPass

**Resources** give an Eloquent-style builder for each collection, reached from the API group it belongs to. They
return models and throw a `ClearPassApiException` when ClearPass answers with an error:

```php
$role = ClearPass::policyElements()->roles()->findByName('[Guest]');           // Role or null
$count = ClearPass::identities()->guestUsers()->where('enabled', true)->count();
$devices = ClearPass::policyElements()->networkDevices()->orderBy('name')->all(); // Collection of NetworkDevice
```

**Requests** are plain Saloon, for when you want the response itself:

```php
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\Identities\GuestUser\GetGuestUsersRequest;

$response = ClearPass::send(new GetGuestUsersRequest(Query::make()->where('role_id', '=', 2)->limit(50)));
$response->status();
$response->json();
$response->dto();   // the same models the resource gives; throws ClearPassApiException for an error status
```

`ClearPass::get()`, `post()`, `put()`, `patch()` and `delete()` send any path, and `ClearPass::from('/some-path')`
gives a builder over a collection the package has no resource for, returning arrays. Every resource, request and
model is listed in [ENDPOINTS.md](ENDPOINTS.md).

### Resources

Each API group is a method on the facade, and each service a method on the group. A collection gives a builder;
a setting ClearPass keeps one of (such as `guestConfiguration()->guestManager()`) gives `get()`, `update()`,
`replace()` and, where ClearPass allows, `create()` and `delete()`; an action ClearPass performs (such as
`guestActions()->sendSmsReceipt($guestId, $body)`) is a method on the group.

```php
ClearPass::identities()->guestUsers()->find(12);                       // by id, null when there is none
ClearPass::identities()->guestUsers()->findByUsername('visitor@example.com');
ClearPass::identities()->guestUsers()->update(12, ['expire_time' => now()->addWeek()]);
ClearPass::identities()->guestUsers()->updateByUsername('visitor@example.com', ['enabled' => false], ['change_of_authorization' => 'true']);
ClearPass::identities()->guestUsers()->replace(12, $guest);            // PUT: the whole record
ClearPass::identities()->guestUsers()->delete(12);
ClearPass::insight()->alerts()->enable(3);                             // the actions a service documents
ClearPass::enforcementProfile()->natPools('ArubaOS-CX')->get();        // a service scoped by a path parameter
ClearPass::guestConfiguration()->guestManager()->update(['...' => '...']);
```

Query options an operation documents, such as `change_of_authorization` on guest and device writes or `async` on
session actions, go in the last array argument.

### The query builder

ClearPass filters, sorts and pages in the query string, and the builder writes those parameters for you: `filter` as
ClearPass's JSON filter expression, `sort` as `+field` or `-field`, `offset` and `limit`.

```php
ClearPass::identities()->guestUsers()
    ->where('role_id', 2)                             // {"role_id": 2}
    ->where('expire_time', '>', now())                // {"expire_time": {"$gt": 1767225600}}
    ->whereIn('sponsor_profile', ['API', 'Reception'])
    ->whereBetween('simultaneous_use', [1, 3])
    ->whereContains('notes', 'parent')
    ->whereRegex('username', '^visitor', caseInsensitive: true)
    ->whereNull('mac')
    ->orderByDesc('expire_time')                      // sort=-expire_time
    ->limit(50)
    ->get();
```

| Builder | ClearPass |
|---|---|
| `where($f, $value)`, `where($f, '=', $value)` | `{"f": value}` |
| `whereNot($f, $value)`, `where($f, '!=', $value)` | `{"f": {"$ne": value}}` |
| `where($f, '>' / '>=' / '<' / '<=', $value)` | `$gt` `$gte` `$lt` `$lte` |
| `whereIn`, `whereNotIn` | `$in`, `$nin` |
| `whereBetween($f, [$from, $to])` | `{"f": {"$gte": from, "$lte": to}}` |
| `whereContains($f, $text)` | `$contains` |
| `whereRegex($f, $pattern, caseInsensitive: true)` | `$regex` with `"$options": "i"` |
| `whereNull`, `whereNotNull` | `{"$exists": false}`, `{"$exists": true}` |
| `orWhere($f, ...)`, `orWhere(fn ($query) => ...)` | `{"$or": [...]}` |
| `whereNot(fn ($query) => ...)` | `{"$not": {...}}` |

Conditions on different fields, and different operators on one field, are ANDed in one object; anything ClearPass
cannot read in one object is wrapped in `{"$and": [...]}`. Dates can be strings or `DateTimeInterface` objects and
are written as the service's records carry them: Unix timestamps for guest accounts and devices, ISO 8601 elsewhere.

Fetching:

| Call | Returns |
|---|---|
| `get()` | a `Collection` of models: one page, as many as `limit()` asked for (ClearPass's default is 25) |
| `all()` | a `Collection` of every matching record, fetched a page at a time |
| `first()` | one model or null, in sort order |
| `count()`, `exists()` | how many records match (asks ClearPass for `calculate_count`) |
| `find($id)`, `findOrFail($id)` | one model by id, null (or `NotFoundException`) when there is none |
| `findBy…($key)` | one model by the other key the service documents: `findByName()`, `findByUsername()`, `findByMacAddress()`, … |
| `lazy($perPage)`, `cursor()` | a `LazyCollection` that fetches each page as the loop reaches it |
| `paginate($perPage)` | a Saloon paginator, for stepping through pages yourself |
| `toRequest()`, `toArray()`, `toFilter()` | the request, the query parameters or the filter the builder would send |

### Models

Every record is a `readonly` class under `spkm\ClearPass\Data\{Group}` whose properties carry ClearPass's own
names and types: `integer` as `int`, `number` as `float`, `boolean` as `bool`, `string` as `string` (with the allowed
values in the property's comment where ClearPass lists them), `date-time` as `CarbonImmutable`, objects as arrays and
lists of records as `Collection`s of their model, all nullable. Anything ClearPass adds later is ignored on the way
in; `toArray()` and `json_encode()` give the record back in ClearPass's keys, leaving out what is null.

```php
$guest = ClearPass::identities()->guestUsers()->findByUsername('visitor@example.com');
$guest->expire_time?->diffForHumans();
$guest->current_state;          // active, disabled, expired or pending
$guest->extra;                  // the custom fields the account carries beyond the documented ones
```

Guest accounts and devices carry custom fields at the top level of the record; the model keeps them in `$extra` and
sends them back the same way. The few field names that aren't PHP identifiers (`DisableTLS1.0` and the like) are
properties with underscores (`DisableTLS1_0`) and serialise under ClearPass's name.

### Writing

A resource creates, updates (PATCH), replaces (PUT) and deletes where ClearPass documents it, taking an array of
ClearPass's field names or a model:

```php
$guest = ClearPass::identities()->guestUsers()->create(['username' => 'visitor@example.com', 'password' => '…', 'role_id' => 2]);
ClearPass::identities()->guestUsers()->update($guest->id, ['notes' => 'Half day']);
ClearPass::identities()->guestUsers()->replace($guest->id, new GuestUser(username: 'visitor@example.com', password: '…', role_id: 2));
ClearPass::identities()->guestUsers()->delete($guest->id, ['change_of_authorization' => 'true']);
```

`create()` returns the record ClearPass stored; `update()` and `replace()` return the record as changed, or null when
ClearPass answers that nothing changed (204 or 304). A resource without a documented write throws a `LogicException`
rather than guessing at a path.

### Errors

A request that ClearPass answers with an error throws a `spkm\ClearPass\ClearPassApiException` (a Saloon
`RequestException`) from `dto()` and from every resource method; `ClearPass::send()` gives you the response to
inspect instead.

| ClearPass's answer | Exception |
|---|---|
| 400, 406, 415 | `InvalidRequestException` |
| 401, 403 (the client's profile doesn't allow the operation) | `UnauthorizedException` |
| 404 | `NotFoundException` |
| 422 (the record was rejected) | `ValidationException`, an `InvalidRequestException` |
| 408, 5xx, or a success whose body isn't JSON | `ServerErrorException` |

The message says what happened (`ClearPass responded 422 to POST /api/guest: Unprocessable Entity; Validation
failed; username: Value is required`): ClearPass's `title` and `detail`, then each field it rejected. `title()`,
`detail()` and `validationMessages()` (field => [rule => message]) give the parts.

### Several servers

Add other servers under `connections` in `config/clearpass.php` and reach them with `ClearPass::connection('name')`,
which gives a connector with the same resources and methods as the facade.

### Caching, timeouts and retries

- `CLEAR_PASS_CACHE=true` caches GET responses for `cache.seconds` (an hour) in `cache.store`.
- `CLEAR_PASS_CONNECT_TIMEOUT` and `CLEAR_PASS_REQUEST_TIMEOUT` (10 and 30 seconds).
- `CLEAR_PASS_RETRIES=3` retries a GET up to three times, with backoff, on a connection failure, 408, 429 or 5xx.
  Writes are never retried.
- `reauthenticate` (on by default) fetches a new token and resends once when ClearPass answers 401.
- `pagination.per_page` (100) sets the page size `all()`, `lazy()` and `paginate()` ask for; ClearPass allows up to
  1000.

## Testing

```bash
composer test
```

The suite fakes ClearPass with Saloon's `MockClient`; nothing reaches a real server.

## Contributing

Run `composer install` once to enable the pre-commit hook, which runs Pint, PHPStan and the tests.

## Security

If you discover a security issue, please email hello@spkmitchell.co.uk rather than opening an issue.

## Credits

- [Simon Mitchell](https://github.com/spkm)

## Licence

MIT.

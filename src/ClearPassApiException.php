<?php

namespace spkm\ClearPass;

use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\Response;
use spkm\ClearPass\Exceptions\InvalidRequestException;
use spkm\ClearPass\Exceptions\NotFoundException;
use spkm\ClearPass\Exceptions\ServerErrorException;
use spkm\ClearPass\Exceptions\UnauthorizedException;
use spkm\ClearPass\Exceptions\ValidationException;

/**
 * An error ClearPass answered with. ClearPass describes errors as API Problem JSON: {"type", "title", "status",
 * "detail"}, with "validation_messages" when a record was rejected and "validation_errors" when a parameter was;
 * the token endpoint answers in OAuth's terms ({"error", "error_description"}), and some services add a "result"
 * with a "message".
 */
class ClearPassApiException extends RequestException
{
    public function __construct(Response $response)
    {
        parent::__construct($response, $this->describe($response));
    }

    /**
     * The exception for ClearPass's error status: a subclass for the errors callers handle differently.
     */
    public static function fromResponse(Response $response): self
    {
        $status = $response->status();

        return match (true) {
            $status === 404 => new NotFoundException($response),
            $response->getRequest() instanceof GetClientCredentialsTokenRequest && in_array($status, [400, 401], true) => new UnauthorizedException($response),
            in_array($status, [401, 403], true) => new UnauthorizedException($response),
            $status === 422 => new ValidationException($response),
            in_array($status, [400, 406, 415], true) => new InvalidRequestException($response),
            $status === 408 || $response->serverError() => new ServerErrorException($response),
            default => new self($response),
        };
    }

    /**
     * ClearPass's short name for the problem, such as "Not Found" or "Unprocessable Entity".
     */
    public function title(): ?string
    {
        return self::text(self::problem($this->getResponse())['title'] ?? null);
    }

    /**
     * ClearPass's explanation of the problem, when it gave one.
     */
    public function detail(): ?string
    {
        return self::text(self::problem($this->getResponse())['detail'] ?? null);
    }

    /**
     * What was wrong with each field of a rejected record: field => [rule => message].
     *
     * @return array<string, array<string, string>>
     */
    public function validationMessages(): array
    {
        return self::validationMessagesIn($this->getResponse());
    }

    protected function describe(Response $response): string
    {
        $text = 'ClearPass responded '.$response->status().' to '.self::requestLine($response);
        $page = self::htmlTitle($response);

        if ($page !== null) {
            return $text.' with an HTML '.($response->successful() ? 'page instead of JSON' : 'error page').($page !== '' ? " ('$page')" : '');
        }

        if ($response->successful() && $response->body() !== '' && ! json_validate($response->body())) {
            return $text.' with a body that is not JSON';
        }

        $message = self::messageIn($response);

        return $text.($message !== null ? ": $message" : '');
    }

    /**
     * The failed request's method and path, without its query string.
     */
    protected static function requestLine(Response $response): string
    {
        $pendingRequest = $response->getPendingRequest();

        return $pendingRequest->getMethod()->value.' '.(parse_url($pendingRequest->getUrl(), PHP_URL_PATH) ?: '/');
    }

    /**
     * The decoded API Problem body, or null when the body isn't a JSON object.
     *
     * @return array<string, mixed>|null
     */
    protected static function problem(Response $response): ?array
    {
        $body = json_decode($response->body(), true);

        return is_array($body) && ! array_is_list($body) ? $body : null;
    }

    /**
     * @return array<string, array<string, string>>
     */
    protected static function validationMessagesIn(Response $response): array
    {
        $problem = self::problem($response) ?? [];
        $messages = [...(is_array($problem['validation_messages'] ?? null) ? $problem['validation_messages'] : []), ...(is_array($problem['validation_errors'] ?? null) ? $problem['validation_errors'] : [])];

        if ($messages === []) {
            return [];
        }

        $result = [];

        foreach ($messages as $field => $rules) {
            if (is_scalar($rules)) {
                $result[(string) $field] = ['invalid' => (string) $rules];

                continue;
            }

            if (! is_array($rules)) {
                continue;
            }

            foreach ($rules as $rule => $message) {
                if (is_scalar($message)) {
                    $result[(string) $field][(string) $rule] = (string) $message;
                } elseif (is_array($message)) {
                    $result[(string) $field][(string) $rule] = implode('; ', array_map(fn (mixed $part) => is_scalar($part) ? (string) $part : json_encode($part), $message));
                }
            }
        }

        return $result;
    }

    /**
     * The title of an HTML error page ('' when it has none), or null when ClearPass didn't send HTML.
     */
    private static function htmlTitle(Response $response): ?string
    {
        if (! str_contains(strtolower((string) $response->header('Content-Type')), 'html') && ! str_starts_with(ltrim($response->body()), '<')) {
            return null;
        }

        return preg_match('#<title>(.*?)</title>#is', $response->body(), $matches) ? trim(html_entity_decode($matches[1])) : '';
    }

    /**
     * What ClearPass said: the title, the detail, then each validation message as "field: message", joined with
     * "; ". Null when it said nothing the package can read.
     */
    private static function messageIn(Response $response): ?string
    {
        $problem = self::problem($response);
        $parts = [];

        if ($problem !== null) {
            foreach (['title', 'error', 'detail', 'error_description'] as $key) {
                $value = self::text($problem[$key] ?? null);

                if ($value !== null && ! in_array($value, $parts, true)) {
                    $parts[] = $value;
                }
            }

            $result = self::text(is_array($problem['result'] ?? null) ? ($problem['result']['message'] ?? null) : null);

            if ($result !== null && ! in_array($result, $parts, true)) {
                $parts[] = $result;
            }

            foreach (self::validationMessagesIn($response) as $field => $rules) {
                $parts[] = $field.': '.implode('; ', array_unique($rules));
            }
        } elseif (! json_validate($response->body()) && trim($response->body()) !== '') {
            $parts[] = trim(substr($response->body(), 0, 200));
        }

        return $parts === [] ? null : implode('; ', array_map(fn (string $part) => rtrim($part, '.'), $parts));
    }

    private static function text(mixed $value): ?string
    {
        return is_scalar($value) && trim((string) $value) !== '' ? trim((string) $value) : null;
    }
}

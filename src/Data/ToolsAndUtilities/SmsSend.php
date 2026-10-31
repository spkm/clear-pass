<?php

namespace spkm\ClearPass\Data\ToolsAndUtilities;

use spkm\ClearPass\Data\Data;

/**
 * A SmsSend record.
 */
readonly class SmsSend extends Data
{
    public function __construct(
        /** Enter the mobile telephone number of the recipient in international format. */
        public ?string $recipient = null,
        /** Enter the message to send (maximum 160 characters). */
        public ?string $message = null,
        /** The visitor’s mobile carrier. One of: , 7-11 Speakout(GSM), Airtel (Andhra Pradesh, India), Airtel (Karnataka, India), Airtel Wireless, Alaska Communications Systems, Alltel Wireless, aql, AT&T Wireless, AT&T Enterprise Paging, BigRedGiant Mobile Solutions, Bell Mobility & Solo Mobile, Boost Mobile, BPL Mobile, Cellular One (Dobson), Cingular, Centennial Wireless, Cincinnati Bell, Claro (Brasil), Claro (Nicaragua), Comcel, Cricket, CTI, Emtel, eOcean, Esendex, Fido, General Communications Inc., Globalstar (satellite), Helio, Illinois Valley Cellular, Iridium (satellite), i wireless, Koodo Mobile, Mediaburst, Meteor, Mero Mobile, MetroPCS, Movicom, Mobitel, Movistar, MTN, MTS, Nextel, Nextel (Mexico), Nextel (Argentina), Orange Polska, Personal, Plateau Wireless, Plus GSM, President's Choice, Qwest, Rogers, SL Interactive, Sasktel, Setar Mobile email (Aruba), Sprint (PCS), Sprint (Nextel), Suncom, Sunrise, T-Mobile, T-Mobile Austria, T-Mobile UK, Telus Mobility, Thumb Cellular, Tigo (Formerly Ola), Tracfone (prepaid), Unicel, US Cellular, Verizon, Vivo, Virgin Mobile Canada, Virgin Mobile, Vodacom, YCC, MobiPCS, SMSLink.ro. */
        public ?string $carrier = null,
        /** Select the service to use when sending the message. */
        public ?int $handler = null,
    ) {}
}

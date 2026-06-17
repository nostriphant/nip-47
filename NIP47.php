<?php

namespace nostriphant;

class NIP47 {
    static function makeRequestEvent(string $wallet_service_pubkey) : NIP01\Rumor {
        return new NIP01\Rumor(time(), 23194, "", [
            ["encryption", "nip44_v2"],
            ["p", $wallet_service_pubkey]
        ]);
    }
}

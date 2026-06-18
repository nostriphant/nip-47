<?php

namespace nostriphant;

class NIP47 {
    static function makeRequestEvent(string $wallet_service_pubkey, string $method, int|string|array ...$params) : NIP47\Request {
        $payload = [
            "method" => $method,
            "params" => $params
        ];
        
        return new NIP47\Request($wallet_service_pubkey, $payload, [
            ["encryption", "nip44_v2"],
            ["p", $wallet_service_pubkey]
        ]);
    }
}

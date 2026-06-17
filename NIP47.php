<?php

namespace nostriphant;

class NIP47 {
    static function makeRequestEvent(string $wallet_service_pubkey, string $method, int|string|array ...$params) : NIP01\Rumor {
        $payload = json_encode([
            "method" => $method,
            "params" => $params
        ]);
        
        $content = $payload;
        
        return new NIP01\Rumor(time(), 23194, $content, [
            ["encryption", "nip44_v2"],
            ["p", $wallet_service_pubkey]
        ]);
    }
}

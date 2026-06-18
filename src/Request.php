<?php

namespace nostriphant\NIP47;

readonly class Request implements \nostriphant\NIP01\Taggable {
    
    public function __construct(public string $wallet_service_pubkey, public array $payload, public array $tags) {
        
        
    }
    
    public function __invoke(\nostriphant\NIP01\Key $private_key): \nostriphant\NIP01\Event {
        $content = \nostriphant\NIP44::encrypt($private_key, $this->wallet_service_pubkey, json_encode($this->payload));
        $rumor = new \nostriphant\NIP01\Rumor(time(), 23194, $content, $this->tags);
        return $rumor($private_key);
    }
}

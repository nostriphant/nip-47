<?php

it('can create an request event', function () {
    $client_key = nostriphant\NIP01\Key::generate();
    $client_pubkey = nostriphant\NIP01\Key::derivePublicKey($client_key);
    
    $wallet_service_key = nostriphant\NIP01\Key::generate();
    $wallet_service_pubkey = nostriphant\NIP01\Key::derivePublicKey($wallet_service_key);
    
    $request = nostriphant\NIP47::makeRequestEvent($wallet_service_pubkey, "pay_invoice", 
        invoice: "lnbc50n1...", // bolt11 invoice
        amount: 123, // invoice amount in msats, optional
        metadata: [] // generic metadata that can be used to add things like zap/boostagram details for a payer name/comment/etc, optional
    );
    
    $event = $request($client_key);
    
    expect($event->kind)->toBe(23194);
    expect(nostriphant\NIP01\Event::hasTagValue($event, 'p', $wallet_service_pubkey))->toBeTrue();
    expect(\nostriphant\NIP01\Event::hasTagValue($event, "encryption", "nip44_v2"))->toBeTrue();
    
    expect(\nostriphant\NIP44::decrypt($wallet_service_key, $client_pubkey, $event->content))->toBe(json_encode([
        "method" => "pay_invoice",
        "params" => [
            "invoice" => "lnbc50n1...", // bolt11 invoice
            "amount" => 123, // invoice amount in msats, optional
            "metadata" => [] // generic metadata that can be used to add things like zap/boostagram details for a payer name/comment/etc, optional
        ]
    ]));
});

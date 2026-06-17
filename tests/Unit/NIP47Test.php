<?php

it('can create an request event', function () {
    $wallet_service_key = nostriphant\NIP01\Key::generate();
    $wallet_service_pubkey = $wallet_service_key(nostriphant\NIP01\Key::public());
    
    $event = nostriphant\NIP47::makeRequestEvent($wallet_service_pubkey);
    
    expect($event->kind)->toBe(23194);
    expect(nostriphant\NIP01\Event::hasTagValue($event, 'p', $wallet_service_pubkey))->toBeTrue();
    expect(\nostriphant\NIP01\Event::hasTagValue($event, "encryption", "nip44_v2"))->toBeTrue();
});

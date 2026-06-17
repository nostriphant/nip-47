<?php

it('can create an info event', function () {
    $key = nostriphant\NIP01\Key::generate();
    
    $event = nostriphant\NIP47::makeInfoEvent($key);
    
    expect($event->kind)->toBe(13194);
    expect($event->pubkey)->toBe($key(nostriphant\NIP01\Key::public()));
    expect(\nostriphant\NIP01\Event::extractTagValues($event, "encryption")[0])->toContain("nip44_v2 nip04");
});

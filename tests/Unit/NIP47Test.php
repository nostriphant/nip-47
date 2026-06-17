<?php

it('can create an request event', function () {
    $event = nostriphant\NIP47::makeRequestEvent();
    
    expect($event->kind)->toBe(23194);
    expect(\nostriphant\NIP01\Event::hasTagValue($event, "encryption", "nip44_v2"))->toBeTrue();
});

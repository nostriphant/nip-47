<?php

it('can create an info event', function () {
    $event = nostriphant\NIP47::makeInfoEvent();
    
    expect($event->kind)->toBe(13194);
    expect(\nostriphant\NIP01\Event::extractTagValues($event, "encryption")[0])->toContain("nip44_v2 nip04");
});

<?php

it('can create an info event', function () {
    $event = nostriphant\NIP47::makeInfoEvent();
    
    expect($event->kind)->toBe(13194);
});

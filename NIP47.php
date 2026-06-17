<?php

namespace nostriphant;

class NIP47 {
    static function makeInfoEvent() : NIP01\Rumor {
        return new NIP01\Rumor(time(), uniqid(), 13194, "", []);
    }
}

<?php

namespace nostriphant;

class NIP47 {
    static function makeRequestEvent() : NIP01\Rumor {
        return new NIP01\Rumor(time(), 23194, "", [
             ["encryption", "nip44_v2"]
        ]);
    }
}

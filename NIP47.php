<?php

namespace nostriphant;

class NIP47 {
    static function makeInfoEvent() : NIP01\Rumor {
        return new NIP01\Rumor(time(), 13194, "", [
             ["encryption", "nip44_v2 nip04"]
        ]);
    }
}

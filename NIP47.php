<?php

namespace nostriphant;

class NIP47 {
    static function makeInfoEvent(NIP01\Key $key) : NIP01\Event {
        return new NIP01\Rumor(time(), $key(NIP01\Key::public()), 13194, "", [
             ["encryption", "nip44_v2 nip04"]
        ])($key);
    }
}

<?php

namespace Tournament;

use Tournament\Weapon\Axe;
use Tournament\Weapon\BaseWeapon;

class Viking extends Warrior
{
    public function __construct()
    {
        parent::__construct();
        $this->hp = Warrior::VIKING_HP;
    }

    public function getDefaultWeapon(): BaseWeapon
    {
        return new Axe();
    }

    function attackModifier(int $damage): int
    {
        return $damage;
    }
}
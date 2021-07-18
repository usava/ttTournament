<?php

namespace Tournament;

use Tournament\Weapon\Axe;
use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\WeaponFactory;

class Viking extends Warrior
{
    public function __construct()
    {
        parent::__construct();
        $this->hp = Warrior::VIKING_HP;
    }

    public function getDefaultWeapon(): BaseWeapon
    {
        return WeaponFactory::create(BaseWeapon::AXE);
    }

    function attackModifier(int $damage): int
    {
        return $damage;
    }
}
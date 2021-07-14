<?php


namespace Tournament;


use Tournament\Weapon\BaseWeapon;

class Viking extends Warrior
{
    public function __construct()
    {
        $this->hp = Warrior::VIKING_HP;
        $this->equip(BaseWeapon::AXE);
    }
}
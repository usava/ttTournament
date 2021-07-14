<?php
namespace Tournament;

use Tournament\Weapon\BaseWeapon;

class Swordsman extends Warrior
{
    public function __construct()
    {
        $this->hp = Warrior::SWORDSMAN_HP;
        $this->equip(BaseWeapon::SWORD);
    }
}

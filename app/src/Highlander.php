<?php


namespace Tournament;


use Tournament\Weapon\BaseWeapon;

class Highlander extends Warrior
{

    public function __construct()
    {
        $this->hp = Warrior::HIGHLANDER_HP;
        $this->equip(BaseWeapon::GREATSWORD);
    }

}
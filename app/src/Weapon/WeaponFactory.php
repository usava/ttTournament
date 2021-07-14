<?php


namespace Tournament\Weapon;

class WeaponFactory
{
    public static function create($weapon)
    {
        switch ($weapon) {
            case BaseWeapon::SWORD:
                return new Sword();
            case BaseWeapon::AXE:
                return new Axe();
            case BaseWeapon::GREATSWORD:
                return new GreatSword();
        }
    }
}
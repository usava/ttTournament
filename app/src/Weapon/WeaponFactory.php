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
            case BaseWeapon::POISON:
                return new Poison();
            case BaseWeapon::BUCKLER:
                return new Buckler();
            case BaseWeapon::ARMOR:
                return new Armor();
        }
    }
}
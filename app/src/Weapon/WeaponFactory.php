<?php


namespace Tournament\Weapon;

/**
 * Class WeaponFactory
 * @package Tournament\Weapon
 */
class WeaponFactory
{
    /**
     * @param $weapon
     * @return Armor|Axe|Buckler|GreatSword|Poison|Sword
     */
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
<?php


namespace Tournament\Weapon;

abstract class BaseWeapon
{
    const SWORD = 'sword';
    const AXE = 'axe';
    const GREATSWORD = 'greatSword';
    const BUCKLER = 'buckler';
    const BUCKLER_HP = 3;
    const WEAPONS = [self::SWORD, self::AXE, self::GREATSWORD];
    const ARMOR = 'armor';
    const REDUCE_RECEIVED_DAMAGE = 3;
    const REDUCE_DELIVERED_DAMAGE = 1;

    abstract function getDamage() : int;

    public function canBroke(string $equipment) : bool
    {
        return false;
    }
}
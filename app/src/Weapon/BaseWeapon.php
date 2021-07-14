<?php


namespace Tournament\Weapon;

abstract class BaseWeapon
{
    const SWORD = 'sword';
    const AXE = 'axe';
    const WEAPONS = [self::SWORD, self::AXE];
    const BUCKLER = 'buckler';
    const BUCKLER_HP = 3;

    protected int $damage;

    abstract function getDamage();

    public function canBroke(string $equipment){
        return false;
    }
}
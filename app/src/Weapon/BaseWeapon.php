<?php


namespace Tournament\Weapon;

abstract class BaseWeapon
{
    const SWORD = 'sword';
    const AXE = 'axe';
    const GREATSWORD = 'greatSword';
    const BUCKLER = 'buckler';
    const ARMOR = 'armor';
    const SWORD_DAMAGE = 5;
    const AXE_DAMAGE = 6;
    const GREATSWORD_DAMAGE = 12;
    const BUCKLER_HP = 3;
    const REDUCE_RECEIVED_DAMAGE = 3;
    const REDUCE_DELIVERED_DAMAGE = -1;
    const POISON = 'poison';
    const POISON_DAMAGE = 20;
    const EQUIPMENT = [self::SWORD, self::AXE, self::GREATSWORD, self::POISON, self::ARMOR, self::BUCKLER];
    const WEAPONS = [self::SWORD, self::AXE, self::GREATSWORD];

    abstract function getDamage(): int;

    public function canBroke(string $equipment): bool
    {
        return false;
    }

    protected function getBlockedDamage(int $damage, bool $destroying): int
    {
        return 0;
    }
}
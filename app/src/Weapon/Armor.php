<?php


namespace Tournament\Weapon;

class Armor extends BaseWeapon
{
    public function getDamage(): int
    {
        return BaseWeapon::REDUCE_DELIVERED_DAMAGE;
    }

    public function getBlockedDamage(int $damage, bool $destroying): int
    {
        return BaseWeapon::REDUCE_RECEIVED_DAMAGE;
    }
}
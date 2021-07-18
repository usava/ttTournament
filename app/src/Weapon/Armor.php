<?php


namespace Tournament\Weapon;

/**
 * Class Armor
 * @package Tournament\Weapon
 */
class Armor extends BaseWeapon
{
    /**
     * @return int
     */
    public function getDamage(): int
    {
        return BaseWeapon::REDUCE_DELIVERED_DAMAGE;
    }

    /**
     * @param int $damage
     * @return int
     */
    public function getBlockedDamage(int $damage): int
    {
        return BaseWeapon::REDUCE_RECEIVED_DAMAGE;
    }
}
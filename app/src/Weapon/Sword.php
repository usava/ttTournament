<?php


namespace Tournament\Weapon;

/**
 * Class Sword
 * @package Tournament\Weapon
 */
class Sword extends BaseWeapon
{
    /**
     * @return int
     */
    function getDamage(): int
    {
        return BaseWeapon::SWORD_DAMAGE;
    }
}
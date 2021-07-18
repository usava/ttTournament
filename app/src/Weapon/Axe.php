<?php


namespace Tournament\Weapon;

/**
 * Class Axe
 * @package Tournament\Weapon
 */
class Axe extends BaseWeapon
{
    /**
     * @var array
     */
    protected array $destroyableEquipment = [BaseWeapon::BUCKLER];

    /**
     * @return int
     */
    function getDamage() : int
    {
        return BaseWeapon::AXE_DAMAGE;
    }
}
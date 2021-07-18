<?php


namespace Tournament\Weapon;

class Axe extends BaseWeapon
{
    protected array $destroyableEquipment = [BaseWeapon::BUCKLER];

    function getDamage() : int
    {
        return BaseWeapon::AXE_DAMAGE;
    }
}
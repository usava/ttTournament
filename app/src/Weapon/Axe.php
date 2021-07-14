<?php


namespace Tournament\Weapon;

class Axe extends BaseWeapon
{
    function getDamage() : int
    {
        return BaseWeapon::AXE_DAMAGE;
    }

    function canBroke($equipment) : bool
    {
        if($equipment === BaseWeapon::BUCKLER){
            return true;
        }

        return false;
    }
}
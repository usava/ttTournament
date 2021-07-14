<?php


namespace Tournament\Weapon;

class Axe extends BaseWeapon
{
    function getDamage() : int
    {
        return 6;
    }

    function canBroke($equipment) : bool
    {
        if($equipment === 'buckler'){
            return true;
        }

        return false;
    }
}
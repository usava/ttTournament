<?php


namespace Tournament\Weapon;

class Axe extends BaseWeapon
{
    function getDamage()
    {
        return 6;
    }

    function canBroke($equipment)
    {
        if($equipment === 'buckler'){
            return true;
        }

        return false;
    }
}
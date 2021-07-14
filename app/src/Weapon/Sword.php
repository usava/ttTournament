<?php


namespace Tournament\Weapon;

class Sword extends BaseWeapon
{
    function getDamage() : int
    {
        return 5;
    }
}
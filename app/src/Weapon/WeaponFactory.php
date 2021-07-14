<?php


namespace Tournament\Weapon;

class WeaponFactory
{
    public static function create($weapon)
    {
        switch ($weapon) {
            case 'sword':
                return new Sword();
            case 'axe':
                return new Axe();
        }
    }
}
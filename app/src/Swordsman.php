<?php
namespace Tournament;

use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\Sword;
use Tournament\Weapon\WeaponFactory;

class Swordsman extends Warrior
{
    const VISIOS_TYPE = 'Vicious';

    public function __construct(string $type = '')
    {
        parent::__construct();
        $this->hp = Warrior::SWORDSMAN_HP;

        if($type === self::VISIOS_TYPE) {
            $this->equip(BaseWeapon::POISON);
        }
    }

    public function getDefaultWeapon(): BaseWeapon
    {
        return WeaponFactory::create(BaseWeapon::SWORD);
    }

    function attackModifier(int $damage): int
    {
        return $damage;
    }
}

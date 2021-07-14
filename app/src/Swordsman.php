<?php
namespace Tournament;

use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\Sword;

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
        return new Sword();
    }

    function attackModifier(int $damage): int
    {
        return $damage;
    }
}

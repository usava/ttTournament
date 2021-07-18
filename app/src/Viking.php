<?php

namespace Tournament;

use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\WeaponFactory;

/**
 * Class Viking
 * @package Tournament
 */
class Viking extends Warrior
{
    /**
     * Viking constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->hp = Warrior::VIKING_HP;
    }

    /**
     * @return BaseWeapon
     */
    public function getDefaultWeapon(): BaseWeapon
    {
        return WeaponFactory::create(BaseWeapon::AXE);
    }

    /**
     * @param int $damage
     * @return int
     */
    function attackModifier(int $damage): int
    {
        return $damage;
    }
}
<?php
namespace Tournament;

use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\WeaponFactory;

/**
 * Class Swordsman
 * @package Tournament
 */
class Swordsman extends Warrior
{
    const VISIOS_TYPE = 'Vicious';
    const REGULAR_TYPE = 'Regular';

    /**
     * Swordsman constructor.
     * @param string $type
     */
    public function __construct(string $type = self::REGULAR_TYPE)
    {
        parent::__construct();
        $this->hp = Warrior::SWORDSMAN_HP;

        if($type === self::VISIOS_TYPE) {
            $this->equip(BaseWeapon::POISON);
        }
    }

    /**
     * @return BaseWeapon
     */
    public function getDefaultWeapon(): BaseWeapon
    {
        return WeaponFactory::create(BaseWeapon::SWORD);
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

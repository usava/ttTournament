<?php

namespace Tournament;

use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\GreatSword;
use Tournament\Weapon\WeaponFactory;

/**
 * Class Highlander
 * @package Tournament
 */
class Highlander extends Warrior
{
    const VETERAN_TYPE = 'Veteran';

    /**
     * @var string
     */
    private string $type;

    /**
     * Highlander constructor.
     * @param string $type
     */
    public function __construct(string $type = '')
    {
        parent::__construct();
        $this->type = $type;
        $this->hp = Warrior::HIGHLANDER_HP;
    }

    /**
     * @return BaseWeapon
     */
    function getDefaultWeapon(): BaseWeapon
    {
        return WeaponFactory::create(BaseWeapon::GREATSWORD);
    }

    /**
     * @param int $damage
     * @return int
     */
    function attackModifier(int $damage): int
    {
        if ($this->type === self::VETERAN_TYPE and $this->isBerserk()) {
            return $damage * 2;
        }

        return $damage;
    }

    /**
     * @return bool
     */
    private function isBerserk(): bool
    {
        return $this->hp < (Warrior::HIGHLANDER_HP * 0.3);
    }
}
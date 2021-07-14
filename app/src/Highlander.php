<?php

namespace Tournament;

use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\GreatSword;

class Highlander extends Warrior
{
    const VETERAN_TYPE = 'Veteran';

    private string $type;

    public function __construct(string $type = '')
    {
        parent::__construct();
        $this->type = $type;
        $this->hp = Warrior::HIGHLANDER_HP;
    }

    function getDefaultWeapon(): BaseWeapon
    {
        return new GreatSword();
    }

    function attackModifier(int $damage): int
    {
        if ($this->type === self::VETERAN_TYPE and $this->isBerserk()) {
            return $damage * 2;
        }

        return $damage;
    }

    private function isBerserk(): bool
    {
        return $this->hp < (Warrior::HIGHLANDER_HP * 0.3);
    }
}
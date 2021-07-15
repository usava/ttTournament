<?php


namespace Tournament\Weapon;

class Poison extends BaseWeapon
{
    const HIT_CHARGES = 2;

    private int $hitsCounter = self::HIT_CHARGES;

    function getDamage(): int
    {
        if ($this->canHit()) {
            return BaseWeapon::POISON_DAMAGE;
        }

        return 0;
    }

    private function canHit(): bool
    {
        if ($this->hitsCounter > 0) {
            $this->hitsCounter--;
            return true;
        }

        return false;
    }
}
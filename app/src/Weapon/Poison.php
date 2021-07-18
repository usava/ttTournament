<?php


namespace Tournament\Weapon;

/**
 * Class Poison
 * @package Tournament\Weapon
 */
class Poison extends BaseWeapon
{
    const HIT_CHARGES = 2;

    /**
     * @var int
     */
    private int $hitsCounter = self::HIT_CHARGES;

    /**
     * @return int
     */
    function getDamage(): int
    {
        if ($this->canHit()) {
            return BaseWeapon::POISON_DAMAGE;
        }

        return 0;
    }

    /**
     * @return bool
     */
    private function canHit(): bool
    {
        if ($this->hitsCounter > 0) {
            $this->hitsCounter--;
            return true;
        }

        return false;
    }
}
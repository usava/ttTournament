<?php


namespace Tournament\Weapon;

/**
 * Class GreatSword
 * @package Tournament\Weapon
 */
class GreatSword extends BaseWeapon
{
    const HITS_FOR_COOLDOWN = 2;

    /**
     * @var int
     */
    private int $hitsForCooldown = self::HITS_FOR_COOLDOWN;

    /**
     * @return int
     */
    function getDamage(): int
    {
        if ($this->canHit()) {
            return BaseWeapon::GREATSWORD_DAMAGE;
        }

        return 0;
    }

    /**
     * @return bool
     */
    private function canHit(): bool
    {
        if ($this->hitsForCooldown > 0) {
            $this->hitsForCooldown--;
            return true;
        }
        $this->hitsForCooldown = self::HITS_FOR_COOLDOWN;

        return false;
    }
}
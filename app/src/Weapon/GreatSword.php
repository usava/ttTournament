<?php


namespace Tournament\Weapon;

class GreatSword extends BaseWeapon
{
    const GREATSWORD_DAMAGE = 12;
    const HITS_FOR_COOLDOWN = 2;

    private int $hitsBeforeCooldown = self::HITS_FOR_COOLDOWN;

    function getDamage() : int
    {
        if ($this->canHit()) {
            return self::GREATSWORD_DAMAGE;
        }

        return 0;
    }

    private function canHit() : bool
    {
        if ($this->hitsBeforeCooldown > 0) {
            $this->hitsBeforeCooldown--;
            return true;
        }
        $this->hitsBeforeCooldown = self::HITS_FOR_COOLDOWN;

        return false;
    }
}
<?php


namespace Tournament\Weapon;

class GreatSword extends BaseWeapon
{
    const HITS_FOR_COOLDOWN = 2;

    private int $hitsForCooldown = self::HITS_FOR_COOLDOWN;

    function getDamage() : int
    {
        if ($this->canHit()) {
            return BaseWeapon::GREATSWORD_DAMAGE;
        }

        return 0;
    }

    private function canHit() : bool
    {
        if ($this->hitsForCooldown > 0) {
            $this->hitsForCooldown--;
            return true;
        }
        $this->hitsForCooldown = self::HITS_FOR_COOLDOWN;

        return false;
    }
}
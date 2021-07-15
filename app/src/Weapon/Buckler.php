<?php


namespace Tournament\Weapon;

class Buckler extends BaseWeapon
{
    const HITS_FOR_COOLDOWN = 1;
    protected int $hp = BaseWeapon::BUCKLER_HP;

    private int $hitsForCooldown = self::HITS_FOR_COOLDOWN;

    public function getDamage(): int
    {
        return 0;
    }

    function getBlockedDamage(int $damage, bool $destroying): int
    {
        if ($this->canBlock()) {
            if ($destroying) {
                $this->hp--;
            }

            return $damage;
        }

        return 0;
    }

    private function canBlock(): bool
    {
        if ($this->hp === 0) {
            return false;
        }

        if ($this->hitsForCooldown > 0) {
            $this->hitsForCooldown--;
            return true;
        }

        $this->hitsForCooldown = self::HITS_FOR_COOLDOWN;

        return false;
    }
}
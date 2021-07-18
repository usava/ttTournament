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

    function getBlockedDamage(int $damage): int
    {
        if ($this->canBlock()) {
            return $damage;
        }

        return 0;
    }

    private function canBlock(): bool
    {
        if ($this->isBroken()) {
            return false;
        }

        if ($this->hitsForCooldown > 0) {
            $this->hitsForCooldown--;
            return true;
        }

        $this->hitsForCooldown = self::HITS_FOR_COOLDOWN;

        return false;
    }

    protected function breaking(): void
    {
        //take hp only when blocking attack
        if($this->hp > 0 and !$this->hitsForCooldown){
            $this->hp--;
        }
    }

    protected function isBroken(): bool
    {
        return $this->hp <= 0;
    }
}
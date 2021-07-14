<?php


namespace Tournament\Weapon;


class Ammunition extends BaseWeapon
{

    private array $weapons = [];

    public function getDamage(): int
    {
        $damage = 0;

        foreach ($this->weapons as $weapon) {
            $damage += $weapon->getDamage();
        }

        return $damage;
    }

    public function getBlockedDamage(int $damage, bool $destroying): int
    {
        $blockedDamage = 0;

        foreach ($this->weapons as $weapon) {
            $blockedDamage += $weapon->getBlockedDamage($damage, $destroying);
        }

        return $blockedDamage;
    }

    public function canBroke($equipmentName): bool
    {
        foreach($this->weapons as $weapon) {
            if($weapon->canBroke($equipmentName)){
                return true;
            }
        }

        return false;
    }

    public function addWeapon(BaseWeapon $weapon): void
    {
        $this->weapons[basename(get_class($weapon))] = $weapon;
    }

    public function hasNoWeapons(): bool
    {
        foreach($this->weapons as $name => $weapon) {
            if(in_array(strtolower($name), BaseWeapon::WEAPONS)){
                return false;
            }
        }

        return true;
    }
}
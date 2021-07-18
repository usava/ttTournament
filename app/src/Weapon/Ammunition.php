<?php


namespace Tournament\Weapon;


class Ammunition
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

    public function getBlockedDamage(int $damage): int
    {
        $blockedDamage = 0;

        foreach ($this->weapons as $weapon) {
            $blockedDamage += $weapon->getBlockedDamage($damage);
        }

        return $blockedDamage;
    }

    /**
     * @param Ammunition $enemyAmmunition
     */
    public function doBreak(Ammunition $enemyAmmunition): void
    {
        foreach ($this->weapons as $weapon) {
            $weapon->doBreak($enemyAmmunition);
        }
    }

    public function addWeapon(BaseWeapon $weapon): void
    {
        $this->weapons[$weapon->getName()] = $weapon;
    }

    public function hasNoWeapons(): bool
    {
        foreach ($this->weapons as $name => $weapon) {
            if (in_array($name, BaseWeapon::WEAPONS)) {
                return false;
            }
        }

        return true;
    }

    public function getWeapons()
    {
        return $this->weapons;
    }
}
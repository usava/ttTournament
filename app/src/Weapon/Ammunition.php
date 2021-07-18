<?php

namespace Tournament\Weapon;

/**
 * Class Ammunition
 * @package Tournament\Weapon
 */
class Ammunition
{
    /**
     * @var array
     */
    private array $weapons = [];

    /**
     * @return int
     */
    public function getDamage(): int
    {
        $damage = 0;

        foreach ($this->weapons as $weapon) {
            $damage += $weapon->getDamage();
        }

        return $damage;
    }

    /**
     * @param int $damage
     * @return int
     */
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

    /**
     * @param BaseWeapon $weapon
     */
    public function addWeapon(BaseWeapon $weapon): void
    {
        $this->weapons[$weapon->getName()] = $weapon;
    }

    /**
     * @return bool
     */
    public function hasNoWeapons(): bool
    {
        foreach ($this->weapons as $name => $weapon) {
            if (in_array($name, BaseWeapon::WEAPONS)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return array
     */
    public function getWeapons()
    {
        return $this->weapons;
    }
}
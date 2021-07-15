<?php

namespace Tournament;

use Tournament\Weapon\Ammunition;
use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\WeaponFactory;

abstract class Warrior
{
    const SWORDSMAN_HP = 100;
    const VIKING_HP = 120;
    const HIGHLANDER_HP = 150;

    protected int $hp;
    protected Warrior $enemy;
    protected Ammunition $ammunition;

    public function __construct()
    {
        $this->ammunition = new Ammunition();
    }

    public function equip($equipmentName): Warrior
    {
        if (in_array($equipmentName, BaseWeapon::EQUIPMENT)) {
            $weapon = WeaponFactory::create($equipmentName);
            $this->ammunition->addWeapon($weapon);
        }

        return $this;
    }

    function engage(Warrior $enemy): void
    {
        $this->setEnemy($enemy);

        $this->checkAmmunition();

        while ($this->alive() and $this->enemy->alive()) {
            $this->attack();

            if ($this->enemy->alive()) {
                $this->enemy->attack();
            }
        }
    }

    protected function alive(): bool
    {
        return $this->hp > 0;
    }

    public function hitPoints(): int
    {
        return max(0, $this->hp);
    }

    protected function attack(): void
    {
        $damage = $this->ammunition->getDamage();
        $damage = $this->attackModifier($damage);

        if ($damage > 0) {
            $this->enemy->defend($damage);
        }
    }

    protected function defend(int $damage): void
    {
        $destroying = $this->enemy->ammunition->canBroke(BaseWeapon::BUCKLER);
        $blockedDamage = $this->ammunition->getBlockedDamage($damage, $destroying);

        $this->injury(max($damage - $blockedDamage, 0));
    }

    protected function injury(int $damage): void
    {
        $this->hp -= $damage;
    }

    /**
     * @param Warrior $enemy
     */
    protected function setEnemy(Warrior $enemy): void
    {
        $enemy->enemy = $this;
        $this->enemy = $enemy;
    }

    protected function checkAmmunition(): void
    {
        if ($this->ammunition->hasNoWeapons()) {
            $this->ammunition->addWeapon($this->getDefaultWeapon());
        }
        if ($this->enemy->ammunition->hasNoWeapons()) {
            $this->enemy->ammunition->addWeapon($this->enemy->getDefaultWeapon());
        }
    }

    abstract function getDefaultWeapon(): BaseWeapon;

    abstract function attackModifier(int $damage): int;
}
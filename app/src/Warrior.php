<?php

namespace Tournament;

use Tournament\Weapon\Ammunition;
use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\WeaponFactory;

/**
 * Class Warrior
 * @package Tournament
 */
abstract class Warrior
{
    const SWORDSMAN_HP = 100;
    const VIKING_HP = 120;
    const HIGHLANDER_HP = 150;

    /**
     * @var int
     */
    protected int $hp;
    /**
     * @var Warrior
     */
    protected Warrior $enemy;
    /**
     * @var Ammunition
     */
    protected Ammunition $ammunition;

    /**
     * Warrior constructor.
     */
    public function __construct()
    {
        $this->ammunition = new Ammunition();
    }

    /**
     * @param $equipmentName
     * @return $this
     */
    public function equip($equipmentName): Warrior
    {
        if (in_array($equipmentName, BaseWeapon::EQUIPMENT)) {
            $weapon = WeaponFactory::create($equipmentName);
            $this->ammunition->addWeapon($weapon);
        }

        return $this;
    }

    /**
     * @param Warrior $enemy
     */
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

    /**
     * @return bool
     */
    protected function alive(): bool
    {
        return $this->hp > 0;
    }

    /**
     * @return int
     */
    public function hitPoints(): int
    {
        return max(0, $this->hp);
    }

    /**
     *
     */
    protected function attack(): void
    {
        $damage = $this->attackModifier($this->ammunition->getDamage());

        if ($damage > 0) {
            $this->enemy->defend($damage);
        }

        $this->ammunition->doBreak($this->enemy->ammunition);
    }

    /**
     * @param int $damage
     */
    protected function defend(int $damage): void
    {
        $blockedDamage = $this->ammunition->getBlockedDamage($damage);

        $this->injury(max($damage - $blockedDamage, 0));
    }

    /**
     * @param int $damage
     */
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

    /**
     * Equip default weapon
     */
    protected function checkAmmunition(): void
    {
        if ($this->ammunition->hasNoWeapons()) {
            $this->ammunition->addWeapon($this->getDefaultWeapon());
        }
        if ($this->enemy->ammunition->hasNoWeapons()) {
            $this->enemy->ammunition->addWeapon($this->enemy->getDefaultWeapon());
        }
    }

    /**
     * @return BaseWeapon
     */
    abstract function getDefaultWeapon(): BaseWeapon;

    /**
     * @param int $damage
     * @return int
     */
    abstract function attackModifier(int $damage): int;
}
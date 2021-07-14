<?php

namespace Tournament;

use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\WeaponFactory;

class Warrior
{
    const SWORDSMAN_HP = 100;
    const VIKING_HP = 120;
    const HIGHLANDER_HP = 150;

    protected int $hp;
    protected BaseWeapon $weapon;
    protected Warrior $enemy;
    protected bool $buckler = false;
    protected int $bucklerHp = BaseWeapon::BUCKLER_HP;
    protected int $hitCounter = 0;
    protected bool $armor = false;

    public function equip($equipmentName): Warrior
    {
        if (in_array($equipmentName, BaseWeapon::WEAPONS)) {
            $this->weapon = WeaponFactory::create($equipmentName);
        }

        if ($equipmentName === BaseWeapon::BUCKLER) {
            $this->buckler = true;
        }

        if ($equipmentName === BaseWeapon::ARMOR) {
            $this->armor = true;
        }

        return $this;
    }

    function engage(Warrior $enemy): void
    {
        $this->setEnemy($enemy);

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
        $this->hitCounter++;
        $damage = $this->weapon->getDamage();

        if($this->armor){
            $damage -= BaseWeapon::REDUCE_DELIVERED_DAMAGE;
        }

        $this->enemy->defend($damage);
    }

    protected function defend(int $damage): Warrior
    {
        if ($this->buckler and !($this->hitCounter % 2)) {
            $damage = 0;

            if ($this->enemy->weapon->canBroke('buckler')){
                $this->bucklerHp--;

                if($this->bucklerHp === 0) {
                    $this->buckler = false;
                }
            }
        }

        if($this->armor) {
            $damage -= BaseWeapon::REDUCE_RECEIVED_DAMAGE;
        }

        if ($damage > 0) {
            $this->hp -= $damage;
        }

        return $this;
    }

    /**
     * @param Warrior $enemy
     */
    protected function setEnemy(Warrior $enemy): void
    {
        $enemy->enemy = $this;
        $this->enemy = $enemy;
    }
}
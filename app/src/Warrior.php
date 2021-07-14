<?php

namespace Tournament;

use Tournament\Weapon\BaseWeapon;
use Tournament\Weapon\WeaponFactory;

class Warrior
{
    protected int $hp;
    public BaseWeapon $weapon;
    public bool $buckler = false;
    protected ?Warrior $enemy = null;
    protected int $bucklerHp = BaseWeapon::BUCKLER_HP;

    public int $hitCounter = 0;

    public function equip($equipmentName): Warrior
    {
        if (in_array($equipmentName, BaseWeapon::WEAPONS)) {
            $this->weapon = WeaponFactory::create($equipmentName);
        }

        if ($equipmentName === BaseWeapon::BUCKLER) {
            $this->buckler = true;
        }

        return $this;
    }

    function engage(Warrior $enemy)
    {
        $this->setEnemy($enemy);

        while ($this->alive() and $this->enemy->alive()) {
            $this->hitCounter++;
            $this->enemy->hitCounter++;
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

    protected function attack()
    {
        $damage = $this->weapon->getDamage();
        $this->enemy->defend($damage);
    }

    protected function defend(int $hit): Warrior
    {
        $block = 0;

        if ($this->buckler and !($this->hitCounter % 2)) {
            $block = $hit;


            if ($this->enemy->weapon->canBroke('buckler')){
                $this->bucklerHp--;

                if($this->bucklerHp < 1) {
                    $this->buckler = false;
                }
            }
        }

        $damage = $hit - $block;
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
        $this->enemy = $enemy;
        $this->enemy->enemy = $this;
    }
}
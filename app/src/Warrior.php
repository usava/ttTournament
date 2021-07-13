<?php

namespace Tournament;


class Warrior
{
    protected int $hp;
    protected Equipment $equipment;

    public function equip() : Warrior
    {
        return $this;
    }

    function engage(Warrior $enemy) : Warrior
    {
        while($this->alive() AND $enemy->alive()) {
            $this->hp -= $enemy->equipment->damage;
            $enemy->hp -= $this->equipment->damage;
        }

        return $this;
    }

    protected function alive() : bool
    {
        return $this->hp > 0;
    }

    public function hitPoints() : int
    {
        return max(0, $this->hp);
    }
}
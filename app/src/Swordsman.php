<?php
namespace Tournament;

class Swordsman extends Warrior
{
    public function __construct()
    {
        $this->hp = 100;
        $this->equip('sword');
    }
}

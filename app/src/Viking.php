<?php


namespace Tournament;


class Viking extends Warrior
{
    public function __construct()
    {
        $this->hp = 120;
        $this->equipment = new Equipment('axe');
    }
}
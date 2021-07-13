<?php


namespace Tournament;


class Equipment
{
    public int $damage;
    public int $attackDivider = 1;

    public function __construct(string $equip)
    {
        switch ($equip) {
            case 'sword':
                $this->damage = 5;
                break;
            case 'axe':
                $this->damage = 6;
                break;
        }
    }
}
<?php


namespace Tournament\Weapon;

abstract class BaseWeapon
{
    const SWORD = 'sword';
    const AXE = 'axe';
    const GREATSWORD = 'greatSword';
    const BUCKLER = 'buckler';
    const ARMOR = 'armor';
    const SWORD_DAMAGE = 5;
    const AXE_DAMAGE = 6;
    const GREATSWORD_DAMAGE = 12;
    const BUCKLER_HP = 3;
    const REDUCE_RECEIVED_DAMAGE = 3;
    const REDUCE_DELIVERED_DAMAGE = -1;
    const POISON = 'poison';
    const POISON_DAMAGE = 20;
    const EQUIPMENT = [self::SWORD, self::AXE, self::GREATSWORD, self::POISON, self::ARMOR, self::BUCKLER];
    const WEAPONS = [self::SWORD, self::AXE, self::GREATSWORD];

    /**
     * @var array
     */
    protected array $destroyableEquipment = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return strtolower(basename(static::class));
    }

    /**
     * @return int
     */
    abstract function getDamage(): int;

    /**
     * @param int $damage
     * @return int
     */
    public function getBlockedDamage(int $damage): int
    {
        return 0;
    }

    /**
     * @return array
     */
    protected function getDestroyableEquipment(): array
    {
        return $this->destroyableEquipment;
    }

    /**
     * @param Ammunition $enemyAmmunition
     */
    public function doBreak(Ammunition $enemyAmmunition): void
    {
        foreach ($enemyAmmunition->getWeapons() as $equipment) {
            if (!empty($this->getDestroyableEquipment())
                and !$equipment->isBroken()
                and in_array($equipment->getName(), $this->getDestroyableEquipment())) {
                $equipment->breaking();
            }
        }
    }

    protected function breaking(): void
    {
    }

    /**
     * @return bool
     */
    protected function isBroken(): bool
    {
        return false;
    }
}
<?php

namespace saturn\items;

use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemIds;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\item\ItemUseResult;
use pocketmine\math\Vector3;

class EnderBuff extends Item {
  
	public function __construct()
    {
        parent::__construct(new ItemIdentifier(ItemIds::ENDER_PEARL, 0));
        $this->setCustomName("§r§b» §fEnder Butt §b«");
    }

    public function onClickAir(Player $player, Vector3 $directionVector): ItemUseResult
    {
        $player->setMotion($player->getDirectionVector()->multiply(1.8));
        return ItemUseResult::FAIL();
    }
}

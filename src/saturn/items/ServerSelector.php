<?php

namespace saturn\items;

use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemIds;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\item\ItemUseResult;
use pocketmine\math\Vector3;
use EasyUI\element\Button;
use EasyUI\variant\SimpleForm;
use saturn\form\ServersForm;

class ServerSelector extends Item {
  
	public function __construct()
    {
        parent::__construct(new ItemIdentifier(ItemIds::COMPASS, 0));
        $this->setCustomName("§r§f» §dServers §f«");
    }

    public function onClickAir(Player $player, Vector3 $directionVector): ItemUseResult
    {
        $player->sendForm(new ServersForm);
        return ItemUseResult::SUCCESS();
    }
}
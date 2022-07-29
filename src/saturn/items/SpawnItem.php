<?php
    
namespace saturn\items;

use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemIds;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\item\ItemUseResult;
use pocketmine\math\Vector3;
use pocketmine\Server;

class SpawnItem extends item {
    
    public function __construct() {
        parent::__construct(new ItemIdentifier(ItemIds::HEART_OF_THE_SEA, 0));
         $this->setCustomName("§r§b» §aSpawn §b«");
   }
   
   public function onClickAir(Player $player, Vector3 $directionVector): ItemUseResult {
   $player->teleport($player->getServer()->getWorldManager()->getDefaultWorld()->getSafeSpawn());
   $player->sendMessage("§l[§c!§r§l] you're back to spawn");
       return ItemUseResult::SUCCESS();
  }

}
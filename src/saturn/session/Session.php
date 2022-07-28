<?php

namespace saturn\session;

use saturn\utils\Utils;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\player\GameMode;

class Session implements Listener {
  
  /** Session Constructor.
	*
	*/
	
	 public function onJoin(PlayerJoinEvent $event)
     {
     $player = $event->getPlayer();
    
    /** Joining Constructor.
     * 
     */
      $event->setJoinMessage(TextFormat::colorize("§l[§dSaturn§r§l] §b{$player->getName()} join the server"));
        
      $player->setGamemode(GameMode::ADVENTURE());
      $player->setHealth(20);
        
      $player->getHungerManager()->setEnabled(false);
      $player->getHungerManager()->setFood(20);
        
      $player->getInventory()->clearAll();
      $player->getOffHandInventory()->clearAll();
      $player->getArmorInventory()->clearAll();
      $player->teleport($player->getServer()->getWorldManager()->getDefaultWorld()->getSafeSpawn());
        
      $player->sendPopup(TextFormat::colorize("&r&eThanks For Playing &dSaturn &fNetwork"));
    
    }
}



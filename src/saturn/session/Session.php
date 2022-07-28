<?php

namespace saturn\session;

use saturn\utils\Utils;
use saturn\items\EnderBuff;
use saturn\items\ServerSelector;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\player\GameMode;

class Session implements Listener {
  
  /** Session Constructor.
	*
	*/
	
   public function OnJoin(PlayerJoinEvent $event)
     {
     $player = $event->getPlayer();
    
    /** Joining Constructor.
    * 
    */
      $event->setJoinMessage(TextFormat::colorize("&7[&dSaturn&f!&7] &f{$player->getName()} join the server"));
        
      $player->setGamemode(GameMode::ADVENTURE());
      $player->setHealth(20);
        
      $player->getHungerManager()->setEnabled(false);
      $player->getHungerManager()->setFood(20);
        
      $player->getInventory()->clearAll();
      $player->getOffHandInventory()->clearAll();
      $player->getArmorInventory()->clearAll();
      $player->teleport($player->getServer()->getWorldManager()->getDefaultWorld()->getSafeSpawn());
      $player->getInventory()->setItem(0, new EnderBuff());
      $player->getInventory()->setItem(4, new ServerSelector());
        
      $player->sendPopup(TextFormat::colorize("&r&eThanks For Playing &dSaturn &fNetwork"));
    }
    public function OnQuit(PlayerQuitEvent $event){
      $player = $event->getPlayer();
    /** Quit Constructor
    *
    */
      $event->setQuitMessage("&7[&dSaturn&f!&7] &f{$player->getName()} quit the server");
      $player->getInventory()->clearAll();
      $player->getOffHandInventory()->clearAll();
      $player->getArmorInventory()->clearAll();
    }
}




<?php

namespace saturn;

use pocketmine\player\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerExhaustEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerDropItemEvent;

class EventListener implements Listener {
  
   public function onDamage(EntityDamageEvent $event):void {
        if(!$event->getEntity() instanceof Player) return;
        
        $event->cancel();
   }
 
   public function onHunger(PlayerExhaustEvent $event):void {
        $event->cancel();
   }
 
   public function onDrop(PlayerDropItemEvent $event) {
     $player = $event->getPlayer();
     $event->cancel();
     $player->sendMessage("§l[§c!§r§l] §cYou can't throw objects here");
   }
}
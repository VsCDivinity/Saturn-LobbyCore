<?php

namespace saturn;

use pocketmine\player\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerExhaustEvent;
use pocketmine\event\entity\EntityDamageEvent;

class EventListener implements Listener {
  
    public function onDamage(EntityDamageEvent $event):void {
        if(!$event->getEntity() instanceof Player) return;
        
        $event->cancel();
 }
 
   public function onHunger(PlayerExhaustEvent $event):void {
        $event->cancel();
 }
 
}
<?php

namespace saturn;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main Extends PluginBase {
  
  use SingletonTrait;
  
  public function OnLoad(): void {
    self::setInstance($this);
    $this->getLogger()->notice("[!] Saturn Core loaded");
  }
  
  public function OnEnable(): void {
    $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    
  }
  
}
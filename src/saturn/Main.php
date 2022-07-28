<?php

namespace saturn;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;
use saturn\commands\InfoCommand;
use saturn\commands\HubCommand;

class Main Extends PluginBase {
  
  use SingletonTrait;
  
  public function OnLoad(): void {
    self::setInstance($this);
    $this->getLogger()->notice("[!] Saturn Core loaded");
  }
  
  public function OnEnable(): void {
    $this->getServer()->getCommandMap()->register('info', new InfoCommand());
    $this->getServer()->getCommandMap()->register('hub', new HubCommand());
    $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    $this->getServer()->getNetwork()->setname($this->GetConfig()->get("LobbyMotd"));
  }
  public function OnDisable(): void {
    $this->getLogger()->notice("[!] Saturn Core Successfully Disabled");
  }
  
}
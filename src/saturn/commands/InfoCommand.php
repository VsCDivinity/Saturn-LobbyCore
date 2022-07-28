<?php

namespace saturn\commands;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\Server;

class InfoCommand extends Command {
  
  public function __construct() {
    parent::__construct('info', '§l[§a!§r§l] Info Lobby Command');
    $this->setPermission('info.use');
  }
  
  public function execute(CommandSender $sender, string $commandLabel, array $args): void {
      if(!$sender->hasPermission("info.use") && !Server::getInstance()->isOp($sender->getName())){
          $sender->sendMessage("§l[§c!§r§l] §cYou do not have permissions to use this command");
          return;
      }
  }
}
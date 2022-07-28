<?php

namespace saturn\scoreboard;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;

class Scoreboard implements Listener {
  
  public function OnJoin(PlayerJoinEvent $event): void {
    $player = $event->getPlayer();
    self::SendBasicScoreboard($player);
  }
  
  public function sendBasicScoreboard(Player $player): void {
    $scoreboard = new ScoreboardAPI();
    $scoreboard->create($player, "§l§dSaturn Network");
    $scoreboard->setLine($player, 1, "");
    $scoreboard->setLine($player, 2, "§l§bSaturn.tebex.ui");
    $scoreboard->setLine($player, 3, "§r");
  }
}
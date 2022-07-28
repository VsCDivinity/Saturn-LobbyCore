<?php

namespace saturn\form;

use EasyUI\variant\SimpleForm;
use EasyUI\element\Button;
use EasyUI\icon\ButtonIcon;
use pocketmine\player\Player;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;

class ServersForm extends SimpleForm {
    
    public function __construct() {
      parent::__construct(TextFormat::colorize("&l&eServer Selector"));
    }
    protected function onCreation(): void {
      $this->addCosmeticsButton();
    }
    private function addCosmeticsButton(): void {
    $button = new Button("§dHCF", null, function (Player $player){
    	$player->transfer("play.infinitymcpe.com", 19132);
    });
    $button->setIcon(new ButtonIcon("textures/items/diamond_sword", ButtonIcon::TYPE_PATH));
    $button->setSubmitListener(function(Player $player){
    });
       $this->addButton($button);
    }
}

<?php
    
namespace saturn\items;

use saturn\Main;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemIds;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\item\ItemUseResult;
use pocketmine\math\Vector3;
use pocketmine\item\VanillaItems;
use pocketmine\block\VanillaBlocks;
use muqsit\invmenu\type\InvMenuTypeIds;
use muqsit\invmenu\InvMenu;
use muqsit\invmenu\transaction\InvMenuTransaction;
use muqsit\invmenu\transaction\InvMenuTransactionResult;

class ShopItem extends Item {
    
    public function __construct() {
        parent::__construct(new ItemIdentifier(ItemIds::ENDER_CHEST, 0));   
        $this->setCustomName("§r§d» §aShop §d«");     
    }
   
    public function onClickAir(Player $player, Vector3 $directionVector): ItemUseResult {
        $menu = InvMenu::create(InvMenuTypeIds::TYPE_DOUBLE_CHEST);
        $config = Main::getInstance()->getConfig();
        $menu->setName("§l§aShop");
        $menu->getInventory()->setContents([
          10 => VanillaBlocks::ENDER_CHEST()->asItem()->setCustomName($config->get("RankName1"))->setLore(["Saturn.tebex.ui"]),
          13 => VanillaBlocks::ENDER_CHEST()->asItem()->setCustomName ($config->get("RankName2"))->setLore(["Saturn.tebex.ui"]),                                               16 => VanillaBlocks::ENDER_CHEST()->asItem()->setCustomName($config->get("RankName3"))->setLore(["Saturn.tebex.ui"]),                                               28 => VanillaBlocks::ENDER_CHEST()->asItem()->setCustomName($config->get("RankName4"))->setLore(["Saturn.tebex.ui"]),
          31 => VanillaBlocks::ENDER_CHEST()->asItem()->setCustomName($config->get("RankName5"))->setLore(["Saturn.tebex.ui"]),
          34 => VanillaBlocks::ENDER_CHEST()->asItem()->setCustomName($config->get("RankName6"))->setLore(["Saturn.tebex.ui"]),
          49 => VanillaItems::ENDER_PEARL()->setCustomName("§c§lClose Menu")->setLore(["§l§cTap to close the menu"]),                                                     ]);
           
       $menu->setListener(function (InvMenuTransaction $transaction): InvMenuTransactionResult {
           $player = $transaction->getPlayer();
           $config = Main::getInstance()->getConfig();
           
           if($transaction->getItemClicked()->getCustomName() === ("§c§lClose Menu")){
              $player->sendMessage("§l§aThank you for coming to the store come back soon"); 
               }
           $transaction->getPlayer()->removeCurrentWindow();
   return $transaction->discard();
        }); 
        $menu->send($player); 
        return ItemUseResult::SUCCESS(); 
    } 

}
<?php

namespace Meru\ID_Stick;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;

class EventListener implements Listener {

    public function onInteract(PlayerInteractEvent $interactEvent)
    {
        $player = $interactEvent->getPlayer();
        $item = $interactEvent->getItem();

        if($item->getId() == 280 and $item->getCustomName() == '§d' . self::prefix . 'IDチャッカー') {
            $block = $interactEvent->getBlock();
            $id = $block->getId();
            if(!$id == 0) {
                $blockname = $block->getName();
                $damage = $block->getDamage();
                $player->sendMessage("§b" . self::prefix . "  ブロックの名前：$blockname ブロックID：$id ダメージ値：$damage");
            }
        }
    }
}

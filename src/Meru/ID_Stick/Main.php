<?php

declare(strict_types=1);

namespace Meru\ID_Stick;

use pocketmine\command\Command;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;

class Main extends PluginBase {

    const prefix = '[ID-Stick]';

    public function onEnable()
    {
        $this->getLogger()->info($this->getDescription()->getFullName() . "読み込みました。 §dVer" . $this->getDescription()->getVersion());
        $this->getLogger()->info("バグ等の報告はGithubまで → " . $this->getDescription()->getWebsite());
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if(!($sender instanceof Player)) {
            return true;
            /** コンソールからの実行を止める */
        }

        $item = Item::get(280, 0);
        $item->setCustomName('§dIDチャッカー');
        $item->setLore(['§dIDなどのブロック情報を取得したいブロックに触ってください。']);
        $sender->getInventory()->addItem($item);
        $sender->sendMessage("§b" . self::prefix . " IDチャッカーをあなたのインベントリにスポーンさせました。§c注意：名前変更をすると使えなくなります。");
        return true;
    }
}
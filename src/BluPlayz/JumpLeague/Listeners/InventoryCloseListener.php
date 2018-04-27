<?php

namespace Bluplayz\JumpLeague\Listeners;

use Bluplayz\JumpLeague\Game\ArenaManager;
use Bluplayz\JumpLeague\Main\JumpLeague;
use pocketmine\event\inventory\InventoryCloseEvent;
use pocketmine\event\Listener;

class InventoryCloseListener implements Listener
{

    public function onClose(InventoryCloseEvent $event)
    {
        $player = $event->getPlayer();

        if (ArenaManager::inArena($player)) {
            $arena = ArenaManager::getArena($player);
            if ($arena->gamestate == 2) {
                $player->teleport(JumpLeague::$oldloc[$player->getName()]);
                if (in_array($player->getName(), JumpLeague::$inChest)) {
                    unset(JumpLeague::$inChest[array_search($player->getName(), JumpLeague::$inChest)]);
                }
            }
        }
    }
    /*
    public function onPacket(DataPacketSendEvent $event) {
        $packet = $event->getPacket();
        $player = $event->getPlayer();
        $name = $player->getName();
        if ($packet instanceof MovePlayerPacket) {
            if(in_array($name, JumpLeague::$inChest)) {
                $event->setCancelled(true);
            }
        }
    }

    */
}
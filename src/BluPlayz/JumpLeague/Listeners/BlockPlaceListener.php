<?php

namespace Bluplayz\JumpLeague\Listeners;

use Bluplayz\JumpLeague\Game\ArenaManager;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\Listener;

class BlockPlaceListener implements Listener
{

    public function onPlace(BlockPlaceEvent $event)
    {
        $player = $event->getPlayer();

        if (ArenaManager::inArena($player)) {
            $event->setCancelled();
        }
    }

}
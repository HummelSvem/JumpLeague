<?php

namespace Bluplayz\JumpLeague\Listeners;

use Bluplayz\JumpLeague\Game\ArenaManager;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;

class BlockBreakListener implements Listener
{

    public function onBreak(BlockBreakEvent $event)
    {
        $player = $event->getPlayer();

        if (ArenaManager::inArena($player)) {
            $event->setCancelled();
        }
    }

}

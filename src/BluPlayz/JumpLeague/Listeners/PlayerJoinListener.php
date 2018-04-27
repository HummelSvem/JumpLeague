<?php

namespace Bluplayz\JumpLeague\Listeners;

use Bluplayz\JumpLeague\Main\JumpLeague;
use Bluplayz\JumpLeague\Tasks\JLCheckSignsTask;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Server;

class PlayerJoinListener implements Listener
{
    public function onJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        Server::getInstance()->getScheduler()->scheduleDelayedTask(new JLCheckSignsTask(JumpLeague::getInstance()), 30);
    }
}
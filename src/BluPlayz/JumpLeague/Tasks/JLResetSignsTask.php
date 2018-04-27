<?php

namespace Bluplayz\JumpLeague\Tasks;

use Bluplayz\JumpLeague\Game\ArenaManager;
use Bluplayz\JumpLeague\Main\JumpLeague;
use pocketmine\scheduler\PluginTask;

class JLResetSignsTask extends PluginTask
{

    public function __construct(JumpLeague $owner)
    {
        parent::__construct($owner);
    }

    public function onRun($currentTick)
    {
        ArenaManager::resetSigns();
    }

}
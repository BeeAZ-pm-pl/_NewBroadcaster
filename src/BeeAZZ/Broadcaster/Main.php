<?php

namespace BeeAZZ\Broadcaster;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
 
 public function onEnable(): void {
   $this->getServer()->getPluginManager()->registerEvents($this, $this);
   $this->saveDefaultConfig();
   $this->getScheduler()->scheduleRepeatingTask(new UpdateTask($this), 20 * $this->getConfig()->getAll()["broadcaster"]["time"]);
 }
}

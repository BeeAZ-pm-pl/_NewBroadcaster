<?php

namespace BeeAZZ\Broadcaster;

use pocketmine\scheduler\Task;
use BeeAZZ\Broadcaster\Main;

class UpdateTask extends Task {
    
    private $main;
    
    private $i;
    
    public function __construct(Main $main){
      $this->main = $main;
	   	$this->i = 0;
    }

    public function onRun() : void {
     $messages = str_replace("{PREFIX}", $this->main->getConfig()->get("prefix"), $this->main->getConfig()->getAll()["broadcaster"]["message"]);
    	back:
    	if($this->i < count($messages)){
    	    $this->main->getServer()->broadcastMessage($messages[$this->i]);
    	    $this->i++;
    	}else{
		    $this->i = 0;
		    goto back;
		}
    }
}

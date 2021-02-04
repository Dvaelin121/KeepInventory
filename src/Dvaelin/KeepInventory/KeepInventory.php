<?php

declare(strict_types=1);

/**
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @author Dvaelin
 * @link github.com/Dvaelin
 * @copyright
 * @license GNU General Public License v3.0
 *
 */
 
namespace Dvaelin\KeepInventory;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;

//Events
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;


class KeepInventory extends PluginBase implements Listener {

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDeath(PlayerDeathEvent $event){
      $player = $event->getPlayer();

      if($player->hasPermission("keepinventory.true")){
        $event->setKeepInventory(true);
        $player->sendMessage("§l§7> §r§aYour inventory has been kept.");
      }else{
        $event->setKeepInventory(false);
        $player->sendMessage("§l§7> §r§cYour inventory has been lost.");
      }
    }
}

<?php

$installer = $this;

$installer->startSetup();

$installer->run("
     
    -- DROP TABLE IF EXISTS {$this->getTable('noshipping')};
    CREATE TABLE {$this->getTable('noshipping')} (
      `destination_id` int(11) unsigned NOT NULL auto_increment,
      `address` varchar(255) NOT NULL default '',
      PRIMARY KEY (`destination_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     
        ");

$installer->endSetup();

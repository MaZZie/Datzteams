<?php
$xpdo_meta_map['datzTeamsGameMode']= array (
  'package' => 'datzteams',
  'version' => NULL,
  'table' => 'datzteams_gamemode',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'gameid' => 0,
    'name' => '',
  ),
  'fieldMeta' => 
  array (
    'gameid' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'default' => 0,
      'null' => false,
      'index' => 'fk',
    ),
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'default' => '',
      'null' => false,
      'index' => 'index',
    ),
  ),
  'composites' => 
  array (
    'Gamemaps' => 
    array (
      'class' => 'datzTeamsGameMaps',
      'local' => 'id',
      'foreign' => 'gamemodeid',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
  ),
  'aggregates' => 
  array (
    'Game' => 
    array (
      'class' => 'datzTeamsGames',
      'local' => 'gameid',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);

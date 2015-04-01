<?php
$xpdo_meta_map['datzTeamsGames']= array (
  'package' => 'datzteams',
  'version' => NULL,
  'table' => 'datzteams_games',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => '',
    'shortname' => '',
  ),
  'fieldMeta' => 
  array (
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'default' => '',
      'null' => false,
      'index' => 'index',
    ),
    'shortname' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '10',
      'phptype' => 'string',
      'default' => '',
      'null' => false,
    ),
  ),
  'composites' => 
  array (
    'Games' => 
    array (
      'class' => 'datzTeams',
      'local' => 'id',
      'foreign' => 'game',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
    'Gamemode' => 
    array (
      'class' => 'datzTeamsGameMode',
      'local' => 'id',
      'foreign' => 'gameid',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
  ),
);

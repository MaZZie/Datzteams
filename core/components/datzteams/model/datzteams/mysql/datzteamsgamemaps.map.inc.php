<?php
$xpdo_meta_map['datzTeamsGameMaps']= array (
  'package' => 'datzteams',
  'version' => NULL,
  'table' => 'datzteams_gamemaps',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'gamemodeid' => 0,
    'name' => '',
  ),
  'fieldMeta' => 
  array (
    'gamemodeid' => 
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
  'aggregates' => 
  array (
    'Gamemode' => 
    array (
      'class' => 'datzTeamsGameMode',
      'local' => 'gamemodeid',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);

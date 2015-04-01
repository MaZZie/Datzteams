<?php
$xpdo_meta_map['datzTeamsMatchPlayers']= array (
  'package' => 'datzteams',
  'version' => NULL,
  'table' => 'datzteams_matchplayers',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'matchid' => 0,
    'player' => 0,
    'opponentplayer' => '',
    'demo' => 'player',
    'votes' => 0,
  ),
  'fieldMeta' => 
  array (
    'matchid' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'default' => 0,
      'null' => false,
      'index' => 'fk',
    ),
    'player' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'default' => 0,
      'null' => true,
      'index' => 'fk',
    ),
    'opponentplayer' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'default' => '',
      'null' => true,
    ),
    'demo' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'default' => 'player',
      'null' => false,
    ),
    'votes' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'default' => 0,
      'null' => false,
      'index' => 'fk',
    ),
  ),
  'aggregates' => 
  array (
    'Match' => 
    array (
      'class' => 'datzTeamsMatch',
      'local' => 'matchid',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'User' => 
    array (
      'class' => 'modUser',
      'local' => 'player',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);

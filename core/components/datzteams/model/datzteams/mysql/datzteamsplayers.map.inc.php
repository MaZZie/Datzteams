<?php
$xpdo_meta_map['datzTeamsPlayers']= array (
  'package' => 'datzteams',
  'version' => NULL,
  'table' => 'datzteams_players',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'teamid' => 0,
    'player' => 0,
    'position' => 'player',
    'about' => NULL,
    'sort' => 1,
    'rights' => 0,
    'joinon' => NULL,
    'lefton' => NULL,
  ),
  'fieldMeta' => 
  array (
    'teamid' => 
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
      'null' => false,
      'index' => 'index',
    ),
    'position' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'default' => 'player',
      'null' => false,
    ),
    'about' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
    ),
    'sort' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 1,
    ),
    'rights' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'boolean',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 0,
    ),
    'joinon' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
    ),
    'lefton' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => true,
    ),
  ),
  'aggregates' => 
  array (
    'User' => 
    array (
      'class' => 'modUser',
      'local' => 'player',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'Team' => 
    array (
      'class' => 'datzTeamsTeams',
      'local' => 'teamid',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);

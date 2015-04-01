<?php
$xpdo_meta_map['datzTeamsTeams']= array (
  'package' => 'datzteams',
  'version' => NULL,
  'table' => 'datzteams_teams',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => '',
    'tag' => '',
    'intern' => 0,
    'createdon' => NULL,
    'deletedon' => NULL,
    'skill' => 0,
    'game' => 0,
    'platform' => 0,
    'esl' => 0,
    'clanbase' => 0,
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
    'tag' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '15',
      'phptype' => 'string',
      'default' => '',
      'null' => false,
      'index' => 'index',
    ),
    'intern' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'boolean',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 0,
    ),
    'createdon' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
    ),
    'deletedon' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => true,
    ),
    'skill' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'boolean',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 0,
    ),
    'game' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 0,
    ),
    'platform' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 0,
    ),
    'esl' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 0,
    ),
    'clanbase' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 0,
    ),
  ),
  'composites' => 
  array (
    'TeamPlayers' => 
    array (
      'class' => 'datzTeamsPlayers',
      'local' => 'id',
      'foreign' => 'teamid',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
    'TeamMatch' => 
    array (
      'class' => 'datzTeamsMatch',
      'local' => 'id',
      'foreign' => 'teamid',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
  ),
  'aggregates' => 
  array (
    'Game' => 
    array (
      'class' => 'datzTeamsGames',
      'local' => 'game',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'Platform' => 
    array (
      'class' => 'datzTeamsPlatform',
      'local' => 'platform',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);

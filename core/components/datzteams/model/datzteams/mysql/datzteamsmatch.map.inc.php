<?php
$xpdo_meta_map['datzTeamsMatch']= array (
  'package' => 'datzteams',
  'version' => NULL,
  'table' => 'datzteams_match',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'teamid' => 0,
    'gameid' => 0,
    'platformid' => 0,
    'opponent' => '',
    'opponenttag' => '',
    'opponentsite' => '',
    'date' => NULL,
    'league' => '',
    'leaguelink' => '',
    'report' => NULL,
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
    'platformid' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'default' => 0,
      'null' => false,
      'index' => 'fk',
    ),
    'opponent' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '50',
      'phptype' => 'string',
      'default' => '',
      'null' => false,
    ),
    'opponenttag' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '15',
      'phptype' => 'string',
      'default' => '',
      'null' => false,
    ),
    'opponentsite' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'default' => '',
      'null' => false,
    ),
    'date' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
    ),
    'league' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'default' => '',
      'null' => false,
    ),
    'leaguelink' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'default' => '',
      'null' => false,
    ),
    'report' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
  ),
  'composites' => 
  array (
    'MatchPlayers' => 
    array (
      'class' => 'datzTeamsMatchPlayers',
      'local' => 'id',
      'foreign' => 'matchid',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
    'MatchMaps' => 
    array (
      'class' => 'datzTeamsMatchPlayers',
      'local' => 'id',
      'foreign' => 'matchid',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
  ),
  'aggregates' => 
  array (
    'Team' => 
    array (
      'class' => 'datzTeams',
      'local' => 'teamid',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);

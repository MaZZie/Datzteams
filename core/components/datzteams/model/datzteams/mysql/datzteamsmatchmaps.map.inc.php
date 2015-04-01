<?php
$xpdo_meta_map['datzTeamsMatchMaps']= array (
  'package' => 'datzteams',
  'version' => NULL,
  'table' => 'datzteams_matchmaps',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'matchid' => 0,
    'mapid' => 0,
    'sort' => 1,
    'ownscore' => 0,
    'opponentscore' => 0,
    'screenshot' => '',
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
    'mapid' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'default' => 0,
      'null' => false,
      'index' => 'fk',
    ),
    'sort' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'boolean',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 1,
    ),
    'ownscore' => 
    array (
      'dbtype' => 'int',
      'precision' => '5',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'default' => 0,
      'null' => false,
      'index' => 'index',
    ),
    'opponentscore' => 
    array (
      'dbtype' => 'int',
      'precision' => '5',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'default' => 0,
      'null' => false,
      'index' => 'index',
    ),
    'screenshot' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'default' => '',
      'null' => false,
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
  ),
);

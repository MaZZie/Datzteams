<?php
$xpdo_meta_map['datzTeamsPlatforms']= array (
  'package' => 'datzteams',
  'version' => NULL,
  'table' => 'datzteams_platforms',
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
    'Platforms' => 
    array (
      'class' => 'datzTeams',
      'local' => 'id',
      'foreign' => 'platform',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
  ),
);

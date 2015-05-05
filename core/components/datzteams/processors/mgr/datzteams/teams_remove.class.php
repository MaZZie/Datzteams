<?php
/**
 * @package datzteam
 * @subpackage processors
 */
class DatzteamRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'datzTeamsTeams';
    public $languageTopics = array('datzteams:default');
    public $objectType = 'datzteams.datzteam';
}
return 'DatzteamRemoveProcessor';

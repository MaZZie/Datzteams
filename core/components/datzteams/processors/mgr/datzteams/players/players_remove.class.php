<?php
/**
 * @package datzteam
 * @subpackage processors
 */
class DatzteamPlayersRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'datzTeamsPlayers';
    public $languageTopics = array('datzteams:default');
    public $objectType = 'datzteams.datzteam';
}
return 'DatzteamPlayersRemoveProcessor';

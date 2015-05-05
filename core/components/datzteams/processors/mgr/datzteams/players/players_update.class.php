<?php
/**
 * @package datzteam
 * @subpackage processors
 */
class DatzteamPlayersUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'datzTeamsPlayers';
    public $languageTopics = array('datzteams:default');
    public $objectType = 'datzteams.datzteam';
}
return 'DatzteamPlayersUpdateProcessor';

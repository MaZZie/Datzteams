<?php
/**
 * @package datzteam
 * @subpackage processors
 */
class DatzteamGamesRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'datzTeamsGames';
    public $languageTopics = array('datzteams:default');
    public $objectType = 'datzteams.datzteam';
}
return 'DatzteamGamesRemoveProcessor';

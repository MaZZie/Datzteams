<?php
/**
 * Get a list of Datzteams
 *
 * @package datzteams
 * @subpackage processors
 */
class DatzteamsGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'datzTeamsTeams';
    public $languageTopics = array('datzteams:default');
    public $defaultSortField = 'name';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'datzteams.datzteam';

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');
        $c->leftJoin('datzTeamsGames', 'Game');
        $c->leftJoin('datzTeamsPlatforms', 'Platform');
        $c->select(array('datzTeamsTeams.*'
                        , 'Game.shortname as gamename'
                        , 'Game.name as gamelongname'
                        , 'Platform.shortname as platformname'
                        , 'Platform.name as platformlongname'
                        ));

        if (!empty($query)) {
            $c->where(array(
                'name:LIKE' => '%'.$query.'%',
                'OR:tag:LIKE' => '%'.$query.'%',
                'OR:Game.shortname:LIKE' => '%'.$query.'%',
                'OR:Platform.shortname:LIKE' => '%'.$query.'%',
                'OR:Platform.name:LIKE' => '%'.$query.'%',
                'OR:Game.name:LIKE' => '%'.$query.'%',
            ));
        }

        return $c;
    }
}
return 'DatzteamsGetListProcessor';

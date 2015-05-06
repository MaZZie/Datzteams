<?php
/**
 * Get a list of Datzteams
 *
 * @package datzteams
 * @subpackage processors
 */
class DatzteamsPlayersGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'datzTeamsPlayers';
    public $languageTopics = array('datzteams:default');
    public $defaultSortField = 'sort';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'datzteams.datzteam';

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');
        $c->leftJoin('modUser', 'User');
        if (!empty($query)) {
            $c->where(array(
                'User.username:LIKE' => '%'.$query.'%',
                'OR:position:LIKE' => '%'.$query.'%',
            ));
        }
        $c->select(array('datzTeamsPlayers.*', 'User.username'));
        $c->where(array(
            'datzTeamsPlayers.teamid' => $_REQUEST['team'],
            'datzTeamsPlayers.lefton' => NULL,
        ));
        return $c;
    }
}
return 'DatzteamsPlayersGetListProcessor';

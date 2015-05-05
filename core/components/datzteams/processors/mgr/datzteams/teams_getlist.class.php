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
        if (!empty($query)) {
            $c->where(array(
                'name:LIKE' => '%'.$query.'%',
                'OR:tag:LIKE' => '%'.$query.'%',
            ));
        }
        return $c;
    }
}
return 'DatzteamsGetListProcessor';

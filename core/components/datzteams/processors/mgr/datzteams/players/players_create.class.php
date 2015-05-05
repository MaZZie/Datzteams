<?php
/**
 * @package datzteams
 * @subpackage processors
 */
class DatzteamPlayersCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'datzTeamsPlayers';
    public $languageTopics = array('datzteams:default');
    public $objectType = 'datzteams.datzteam';

    public function beforeSave() {
        $name = $this->getProperty('player');

        if (empty($name)) {
            $this->addFieldError('player',$this->modx->lexicon('datzteams.datzteam_err_ns_name'));
        } else if ($this->doesAlreadyExist(array('name' => $name))) {
            $this->addFieldError('player',$this->modx->lexicon('datzteams.datzteam_err_ae'));
        }
        return parent::beforeSave();
    }
}
return 'DatzteamPlayersCreateProcessor';

<?php
/**
 * @package datzteams
 * @subpackage processors
 */
class DatzteamPlatformsCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'datzTeamsPlatforms';
    public $languageTopics = array('datzteams:default');
    public $objectType = 'datzteams.datzteam';

    public function beforeSave() {
        $name = $this->getProperty('name');

        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('datzteams.datzteam_err_ns_name'));
        } else if ($this->doesAlreadyExist(array('name' => $name))) {
            $this->addFieldError('name',$this->modx->lexicon('datzteams.datzteam_err_ae'));
        }
        return parent::beforeSave();
    }
}
return 'DatzteamPlatformsCreateProcessor';

<?php
require_once (dirname(__FILE__).'/games/games_update.class.php');
/**
 * @package datzteams
 * @subpackage processors
 */
class DatzteamGamesUpdateFromGridProcessor extends DatzteamUpdateProcessor {
    public function initialize() {
        $data = $this->getProperty('data');
        if (empty($data)) return $this->modx->lexicon('invalid_data');
        $data = $this->modx->fromJSON($data);
        if (empty($data)) return $this->modx->lexicon('invalid_data');
        $this->setProperties($data);
        $this->unsetProperty('data');

        return parent::initialize();
    }
}
return 'DatzteamGamesUpdateFromGridProcessor';

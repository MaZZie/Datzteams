<?php
require_once dirname(dirname(__FILE__)) . '/model/datzteams/datzteams.class.php';
class DatzteamsIndexManagerController extends modExtraManagerController {
    /** @var Datzteams $datzteams */
    public $datzteams;
    public function initialize() {
        $this->datzteams = new Datzteams($this->modx);
        //$this->addCss($this->datzteams->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->datzteams->config['jsUrl'].'mgr/datzteams.js');
        $this->addHtml('<script type="text/javascript">
            Ext.onReady(function() {
                Datzteams.config = '.$this->modx->toJSON($this->datzteams->config).';
            });
            </script>');
            return parent::initialize();
    }
    public function getLanguageTopics() {
            return array('datzteams:default');
    }
    public function checkPermissions() { return true;}
    public function process(array $scriptProperties = array()) {}
    public function getPageTitle() { return $this->modx->lexicon('datzteams'); }
    public function loadCustomCssJs() {
        $this->addJavascript($this->datzteams->config['jsUrl'].'mgr/widgets/teams.grid.js');
        $this->addJavascript($this->datzteams->config['jsUrl'].'mgr/widgets/games.grid.js');
        $this->addJavascript($this->datzteams->config['jsUrl'].'mgr/widgets/platforms.grid.js');
        $this->addJavascript($this->datzteams->config['jsUrl'].'mgr/combos.js');
        $this->addJavascript($this->datzteams->config['jsUrl'].'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->datzteams->config['jsUrl'].'mgr/sections/index.js');
    }
    public function getTemplateFile() {
        return $this->datzteams->config['templatesPath'].'home.tpl';
    }
}

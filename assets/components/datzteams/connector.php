<?php
/**
 * Datzteams Connector
 *
 * @package datzteams
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('datzteams.core_path',null,$modx->getOption('core_path').'components/datzteams/');
require_once $corePath.'model/datzteams/datzteams.class.php';
$modx->datzteams = new Datzteams($modx);

$modx->lexicon->load('datzteams:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->datzteams->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));

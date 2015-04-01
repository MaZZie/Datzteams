<?php
/**
 * @package doodles
 */
$datz = $modx->getService('datzteams','Datzteams',$modx->getOption('datzteams.core_path',null,$modx->getOption('core_path').'components/datzteams/').'model/datzteams/',$scriptProperties);
if (!($datz instanceof Datzteams)) return '';

/* setup default properties */
$tpl = $modx->getOption('tpl',$scriptProperties,'rowTpl');
$sort = $modx->getOption('sort',$scriptProperties,'name');
$dir = $modx->getOption('dir',$scriptProperties,'ASC');

/* build query */
$c = $modx->newQuery('datzTeamsTeams');
$c->sortby($sort,$dir);
$datzteams = $modx->getCollection('datzTeamsTeams',$c);

/* iterate */
$output = '';
foreach ($datzteams as $datzteam) {
    $datzteamArray = $datzteam->toArray();
    $output .= $datz->getChunk($tpl,$datzteamArray);
}
return $output;
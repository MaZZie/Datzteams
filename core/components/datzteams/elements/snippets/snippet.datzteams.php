<?php
/**
 * @package datzteams
 */
$datz = $modx->getService('datzteams','Datzteams',$modx->getOption('datzteams.core_path',null,$modx->getOption('core_path').'components/datzteams/').'model/datzteams/',$scriptProperties);
if (!($datz instanceof Datzteams)) return '';

/* setup default properties */
$tpl = $modx->getOption('tpl',$scriptProperties,'rowTpl');
$tplPlayers = $modx->getOption('tpl',$scriptProperties,'rowplayers');
$sort = $modx->getOption('sort',$scriptProperties,'name');
$dir = $modx->getOption('dir',$scriptProperties,'ASC');

/* build query */
$c = $modx->newQuery('datzTeamsTeams');
$c->leftJoin('datzTeamsGames', 'Game');
$c->leftJoin('datzTeamsPlatforms', 'Platform');
$c->select(array('datzTeamsTeams.*'
                , 'Game.shortname as gamename'
                , 'Game.name as gamelongname'
                , 'Platform.shortname as platformname'
                , 'Platform.name as platformlongname'
                ));
$c->sortby($sort,$dir);
$datzteams = $modx->getCollection('datzTeamsTeams',$c);

/* iterate */
$output = '';
foreach ($datzteams as $datzteam) {
    $datzteamArray = $datzteam->toArray();
    $output .= $datz->getChunk($tpl,$datzteamArray);

    $c2 = $modx->newQuery('datzTeamsPlayers');
    $c2->leftJoin('modUser', 'User');
    $c2->select(array('datzTeamsPlayers.*', 'User.username'));
    $c2->where(array(
        'datzTeamsPlayers.teamid' => $datzteamArray['id'],
        'datzTeamsPlayers.lefton' => NULL,
    ));
    $c2->sortby('sort',$dir);
    $datzteamsPlayers = $modx->getCollection('datzTeamsPlayers',$c2);
    foreach ($datzteamsPlayers as $datzteamPlayer) {
        $datzteamplayerArray = $datzteamPlayer->toArray();
        $output .= $datz->getChunk($tplPlayers,$datzteamplayerArray);
    }
}
return $output;
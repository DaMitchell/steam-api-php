#!/usr/bin/env php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Message\FutureResponse;
use GuzzleHttp\Message\Response;
use Steam\Configuration;
use Steam\Command\WebApiUtil\GetSupportedApiList;
use Steam\Runner\GuzzleRunner;
use Steam\Steam;
use Steam\Utility\GuzzleUrlBuilder;

$config = include_once './steamKey.php';

$steam = new Steam(new Configuration([
    Configuration::STEAM_KEY => $config['key'],
]));
$steam->addRunner(new GuzzleRunner(new Client(), new GuzzleUrlBuilder()));

/** @var FutureResponse $result */
$result = $steam->run(new GetSupportedApiList());

$interfaceMappings = [
    'ICSGOServers_730' => 'CSGOServers',
    'IDOTA2Fantasy_205790' => 'Dota2\Fantasy',
    'IDOTA2Fantasy_570' => 'Dota2\Fantasy',
    'IDOTA2Match_205790' => 'Dota2\Match',
    'IDOTA2Match_570' => 'Dota2\Match',
    'IDOTA2Ticket_570' => 'Dota2\Ticket',
    'IEconDOTA2_205790' => 'Dota2',
    'IEconDOTA2_570' => 'Dota2',
    'IEconItems_205790' => 'EconItems',
    'IEconItems_218620' => 'EconItems',
    'IEconItems_221540' => 'EconItems',
    'IEconItems_238460' => 'EconItems',
    'IEconItems_440' => 'EconItems',
    'IEconItems_570' => 'EconItems',
    'IEconItems_620' => 'EconItems',
    'IEconItems_730' => 'EconItems',
    'IEconItems_841' => 'EconItems',
    'IGCVersion_205790' => 'Version',
    'IGCVersion_440' => 'Version',
    'IGCVersion_570' => 'Version',
    'IGCVersion_730' => 'Version',
    'IPortal2Leaderboards_620' => 'Portal2Leaderboards',
    'IPortal2Leaderboards_841' => 'Portal2Leaderboards',
    'ISteamApps' => 'Apps',
    'ISteamCDN' => 'Cdn',
    'ISteamDirectory' => 'Directory',
    'ISteamEconomy' => 'Economy',
    'ISteamEnvoy' => 'Envoy',
    'ISteamNews' => 'News',
    'ISteamPayPalPaymentsHub' => 'PayPalPaymentsHub',
    'ISteamRemoteStorage' => 'RemoteStorage',
    'ISteamUser' => 'User',
    'ISteamUserAuth' => 'UserAuth',
    'ISteamUserOAuth' => 'UserOAuth',
    'ISteamUserStats' => 'UserStats',
    'ISteamWebAPIUtil' => 'WebApiUtil',
    'ISteamWebUserPresenceOAuth' => 'WebUserPresenceOAuth',
    'ITFItems_440' => 'TeamFortressItems',
    'ITFPromos_205790' => 'Promos',
    'ITFPromos_440' => 'Promos',
    'ITFPromos_570' => 'Promos',
    'ITFPromos_620' => 'Promos',
    'ITFPromos_730' => 'Promos',
    'ITFPromos_841' => 'Promos',
    'IGameServersService' => 'GameServersService',
    'IPublishedFileService' => 'PublishedFileService',
    'IPlayerService' => 'PlayerService',
    'IEconService' => 'EconService',
    'ICheatReportingService' => 'CheatReportingService',
    'IAccountRecoveryService' => 'AccountRecoveryService',
];

$getInterfaceMapping = function($interfaceName) use ($interfaceMappings) {
    if(array_key_exists($interfaceName, $interfaceMappings)) {
        return $interfaceMappings[$interfaceName];
    }

    return false;
};

$baseCommandNamespace = 'Steam\Command';

//echo $getInterfaceMapping('ITFPromos_') . "\n";

echo "\n";

$result->then(function(Response $response) use ($baseCommandNamespace, $getInterfaceMapping){
    $classes = [];

    $callback = function($interface) use ($baseCommandNamespace, $getInterfaceMapping, &$classes) {
        //echo "'" . $interface['name'] . "' => '" . $getInterfaceMapping($interface['name']) . "',\n";

        foreach($interface['methods'] as $method) {
            if($method['httpmethod'] !== 'GET') {
                continue;
            }

            if($interfaceName = $getInterfaceMapping($interface['name'])) {

                $commandClass = sprintf('%s\%s\%s', $baseCommandNamespace, $interfaceName, $method['name']);

                if(!class_exists($commandClass) && !in_array($commandClass, $classes)) {
                    $classes[] = $commandClass;

                    echo "$commandClass\n";
                }
            } else {
                echo sprintf("NEED A MAPPING FOR: interface: %s method: %s\n", $interface['name'], $method['name']);
            }

            //echo sprintf("/%s/%s/%s\n", $interface['name'], $method['name'], 'v' . $method['version']);
        }
    };

    array_map($callback, $response->json()['apilist']['interfaces']);

    //var_dump($classes);
})->then(function(){
    echo "\n";
});


/*var_dump(bcadd(
    bcadd(
        (string) ((int)44592225 * 2),
        '76561197960265728'
    ),
    0, 0
));*/
<?php

return [
    'lastfm' => [
        'auth' => [
            'api_key' => null,
            'secret' => null,
        ],
        'client' => [
            'default_parameters' => null,
        ],
    ],
    'lastfm_services' => [
        'initializers' => [
            'ZfSnapLastFm\Service\Initializer',
        ],
        'invokables' => [
            'Album' => 'LastFmClient\Service\Album',
            'Artist' => 'LastFmClient\Service\Artist',
            'Auth' => 'LastFmClient\Service\Auth',
            'Track' => 'LastFmClient\Service\Track',
            'User' => 'LastFmClient\Service\User',
        ],
    ],
    'service_manager' => [
        'invokables' => [
            'LastFmClient\Transport\Curl' => 'LastFmClient\Transport\Curl',
        ],
        'factories' => [
            'LastFmClient\Auth' => 'ZfSnapLastFm\AuthFactory',
            'LastFmClient\Client' => 'ZfSnapLastFm\ClientFactory',
            'ZfSnapLastFm\Service\PluginManager' => 'ZfSnapLastFm\Service\PluginManagerFactory',
        ],
        'aliases' => [
            'lastfm.transport' => 'LastFmClient\Transport\Curl',
            'lastfm.services' => 'ZfSnapLastFm\Service\PluginManager',
        ],
    ],
];
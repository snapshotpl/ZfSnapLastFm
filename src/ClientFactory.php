<?php

namespace ZfSnapLastFm;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * ClientFactory
 *
 * @author Witold Wasiczko <witold@wasiczko.pl>
 */
class ClientFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $auth = $serviceLocator->get('LastFmClient\Auth');
        $transport = $serviceLocator->get('lastfm.transport');
        $client = new \LastFmClient\Client($auth, $transport);

        $config = $serviceLocator->get('Config');
        $defaultParameters = $config['lastfm']['client']['default_parameters'];

        if (is_array($defaultParameters)) {
            $client->setDefaultParameters($defaultParameters);
        }

        return $client;
    }

}

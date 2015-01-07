<?php

namespace ZfSnapLastFm;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * AuthFactory
 *
 * @author Witold Wasiczko <witold@wasiczko.pl>
 */
class AuthFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $authConfig = $config['lastfm']['auth'];

        $auth = new \LastFmClient\Auth();

        $auth->setApiKey($authConfig['api_key']);
        $auth->setSecret($authConfig['secret']);

        return $auth;
    }

}

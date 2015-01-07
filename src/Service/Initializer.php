<?php

namespace ZfSnapLastFm\Service;

use LastFmClient\ClientAwareInterface;
use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Initializator
 *
 * @author Witold Wasiczko <witold@wasiczko.pl>
 */
class Initializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $client = $sm->get('LastFmClient\Client');

        /* @var $instance ClientAwareInterface */
        $instance->setClient($client);
    }

}

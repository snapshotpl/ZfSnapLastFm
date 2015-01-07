<?php

namespace ZfSnapLastFm;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\ModuleManagerInterface;

/**
 * Module
 *
 * @author Witold Wasiczko <witold@wasiczko.pl>
 */
class Module implements ConfigProviderInterface, InitProviderInterface
{
    public function getConfig()
    {
        return require __DIR__ . '/../config/module.config.php';
    }

    public function init(ModuleManagerInterface $manager)
    {
        $sm = $manager->getEvent()->getParam('ServiceManager');

        $serviceManager = 'ZfSnapLastFm\Service\PluginManager';
        $key = 'lastfm_services';
        $moduleInterface = 'ZfSnapLastFm\Service\PluginProviderInterface';
        $method = 'getLastFmServices';

        /* @var $serviceListener \Zend\ModuleManager\Listener\ServiceListener */
        $serviceListener = $sm->get('ServiceListener');
        $serviceListener->addServiceManager($serviceManager, $key, $moduleInterface, $method);
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

}

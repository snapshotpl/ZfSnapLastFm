<?php

namespace ZfSnapLastFm\Service;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

/**
 * PluginManagerFactory
 *
 * @author Witold Wasiczko <witold@wasiczko.pl>
 */
class PluginManagerFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = 'ZfSnapLastFm\Service\PluginManager';
}

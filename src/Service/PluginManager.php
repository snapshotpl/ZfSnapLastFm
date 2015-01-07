<?php

namespace ZfSnapLastFm\Service;

use InvalidArgumentException;
use LastFmClient\ClientAwareInterface;
use Zend\ServiceManager\AbstractPluginManager;

/**
 * PluginManager
 *
 * @author Witold Wasiczko <witold@wasiczko.pl>
 */
class PluginManager extends AbstractPluginManager
{
    public function validatePlugin($plugin)
    {
        if (!$plugin instanceof ClientAwareInterface) {
            throw new InvalidArgumentException(sprintf(
                'Plugin of type %s is invalid; must implement LastFmClient\ClientAwareInterface',
                (is_object($plugin) ? get_class($plugin) : gettype($plugin))
            ));
        }
    }

}

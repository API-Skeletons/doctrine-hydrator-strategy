<?php

namespace ZF\Doctrine\Hydrator\Strategy;

use Laminas\ServiceManager\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class EntityLinkFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, $requestedName);
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');

        $entityLink = new EntityLink();
        $entityLink->setMetadataMap($config['api-tools-hal']['metadata_map']);
        $entityLink->setDoctrineHydratorConfig($config['doctrine-hydrator']);
        $entityLink->setServiceLocator($container);

        return $entityLink;
    }
}

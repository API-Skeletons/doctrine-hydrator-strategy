<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'ApiSkeletons\Doctrine\Hydrator\Strategy\CollectionExtract' =>
                'Laminas\ServiceManager\Factory\InvokableFactory',
            'ApiSkeletons\Doctrine\Hydrator\Strategy\CollectionLink' =>
                'ApiSkeletons\Doctrine\Hydrator\Strategy\CollectionLinkFactory',
            'ApiSkeletons\Doctrine\Hydrator\Strategy\EntityLink' =>
                'ApiSkeletons\Doctrine\Hydrator\Strategy\EntityLinkFactory',
        ),
    ),
);

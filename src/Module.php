<?php

namespace ApiSkeletons\Doctrine\Hydrator\Strategy;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}

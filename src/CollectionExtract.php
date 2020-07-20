<?php

namespace ApiSkeletons\Doctrine\Hydrator\Strategy;

use Laminas\Hydrator\Strategy\StrategyInterface;
use DoctrineModule\Stdlib\Hydrator\Strategy\AbstractCollectionStrategy;
use Laminas\ApiTools\Hal\Collection;

/**
 * Class CollectionExtract
 * A field-specific hydrator for collections.
 * This works by wrapping an array or collection in a HAL collection
 *
 * @returns HalCollection
 */
class CollectionExtract extends AbstractCollectionStrategy implements
    StrategyInterface
{
    public function extract($value)
    {
        $value = ($value) ?: [];
        $halCollection = new Collection($value);

        return $halCollection;
    }

    public function hydrate($value)
    {
        // This strategy does note support hydration of collections.
    }
}

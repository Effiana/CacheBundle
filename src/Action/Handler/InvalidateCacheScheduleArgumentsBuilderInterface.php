<?php

namespace Effiana\CacheBundle\Action\Handler;

use Effiana\CacheBundle\DataStorage\DataStorageInterface;

interface InvalidateCacheScheduleArgumentsBuilderInterface
{
    /**
     * @param DataStorageInterface $dataStorage
     *
     * @return string[]
     */
    public function build(DataStorageInterface $dataStorage);
}

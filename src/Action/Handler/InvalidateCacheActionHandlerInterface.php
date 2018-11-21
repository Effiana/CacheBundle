<?php

namespace Effiana\CacheBundle\Action\Handler;

use Effiana\CacheBundle\DataStorage\DataStorageInterface;

interface InvalidateCacheActionHandlerInterface
{
    /**
     * @param DataStorageInterface $dataStorage
     */
    public function handle(DataStorageInterface $dataStorage);
}

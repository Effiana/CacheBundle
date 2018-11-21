<?php

namespace Effiana\CacheBundle\Action\DataStorage;

use Effiana\CacheBundle\DataStorage\DataStorageInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class InvalidateCacheDataStorage extends ParameterBag implements DataStorageInterface
{
}

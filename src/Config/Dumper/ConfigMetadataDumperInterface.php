<?php
/**
 * This file is part of the BrandOriented package.
 *
 * (c) Brand Oriented sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dominik Labudzinski <dominik@labudzinski.com>
 */

namespace Effiana\CacheBundle\Config\Dumper;

use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Interface ConfigMetadataDumperInterface
 * @package Config\Dumper
 */
interface ConfigMetadataDumperInterface
{
    /**
     * Write meta file with resources related to specific config type
     *
     * @param ContainerBuilder $container container with resources to dump
     */
    public function dump(ContainerBuilder $container);
    /**
     * Check are config resources fresh?
     *
     * @return bool true if data in cache is present and up to date, false otherwise
     */
    public function isFresh();
}
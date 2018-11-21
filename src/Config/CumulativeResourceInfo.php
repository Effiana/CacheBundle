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

namespace Effiana\CacheBundle\Config;

/**
 * Class CumulativeResourceInfo
 * @package Effiana\CacheBundle\Config
 */
class CumulativeResourceInfo
{
    /**
     * @var string
     */
    public $bundleClass;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $path;
    /**
     * @var array
     */
    public $data = [];
    /**
     * @param string $bundleClass
     * @param string $name
     * @param string $path
     * @param array  $data
     */
    public function __construct($bundleClass, $name, $path, array $data = [])
    {
        $this->bundleClass = $bundleClass;
        $this->name        = $name;
        $this->path        = $path;
        $this->data        = $data;
    }
}
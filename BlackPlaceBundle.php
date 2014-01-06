<?php

namespace Black\Bundle\PlaceBundle;

use Black\Bundle\PlaceBundle\DependencyInjection\BlackPlaceExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class BlackPlaceBundle
 *
 * @package Black\Bundle\PlaceBundle
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class BlackPlaceBundle extends Bundle
{
    /**
     * @return BlackPlaceExtension|null|\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
     */
    public function getContainerExtension()
    {
        return new BlackPlaceExtension();
    }
}

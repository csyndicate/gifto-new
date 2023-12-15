<?php

namespace ShopMagicTwilioVendor\WPDesk\View\Resolver;

use ShopMagicTwilioVendor\WPDesk\View\Renderer\Renderer;
use ShopMagicTwilioVendor\WPDesk\View\Resolver\Exception\CanNotResolve;
/**
 * This resolver never finds the file
 *
 * @package WPDesk\View\Resolver
 */
class NullResolver implements \ShopMagicTwilioVendor\WPDesk\View\Resolver\Resolver
{
    public function resolve($name, \ShopMagicTwilioVendor\WPDesk\View\Renderer\Renderer $renderer = null)
    {
        throw new \ShopMagicTwilioVendor\WPDesk\View\Resolver\Exception\CanNotResolve("Null Cannot resolve");
    }
}

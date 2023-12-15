<?php

declare (strict_types=1);
namespace ShopMagicVendor\DI;

use ShopMagicVendor\Psr\Container\ContainerExceptionInterface;
/**
 * Exception for the Container.
 */
class DependencyException extends \Exception implements ContainerExceptionInterface
{
}

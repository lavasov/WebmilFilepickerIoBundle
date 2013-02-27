<?php

namespace Webmil\FilepickerIoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Oleksandr Lavasov <imsashko@gmail.com>
 */
class WebmilFilepickerIoBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }
}
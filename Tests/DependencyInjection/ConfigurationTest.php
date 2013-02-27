<?php

namespace Webmil\FilepickerIoBundle\Tests\DependencyInjection;

use Webmil\FilepickerIoBundle\DependencyInjection\Configuration;

/**
 * @author Oleksandr Lavasov <imsashko@gmail.com>
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testThatCanGetConfigTreeBuilder()
    {
        $configuration = new Configuration();
        $this->assertInstanceOf('Symfony\Component\Config\Definition\Builder\TreeBuilder', $configuration->getConfigTreeBuilder());
    }
}
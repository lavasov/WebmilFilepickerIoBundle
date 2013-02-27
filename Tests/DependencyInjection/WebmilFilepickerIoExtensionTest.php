<?php

namespace Webmil\FilepickerIoBundle\Test\DependencyInjection;

use Webmil\FilepickerIoBundle\DependencyInjection\WebmilFilepickerIoExtension;

/**
 * @author Oleksandr Lavasov <imsashko@gmail.com>
 */
class WebmilFilepickerIoExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
    * @covers Webmil\FilepickerIoBundle\DependencyInjection\WebmilFilepickerIoExtension::load
    */
    public function testLoadFailure()
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $extension = $this->getMockBuilder('Webmil\\FilepickerIoBundle\\DependencyInjection\\WebmilFilepickerIoExtension')
            ->getMock();

        $extension->load(array(array()), $container);
    }

    /**
    * @covers Webmil\FilepickerIoBundle\DependencyInjection\WebmilFilepickerIoExtension::load
    */
    public function testLoadSetParameters()
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $parameterBag = $this->getMockBuilder('Symfony\Component\DependencyInjection\ParameterBag\\ParameterBag')
            ->disableOriginalConstructor()
            ->getMock();

        $parameterBag
            ->expects($this->any())
            ->method('add');

        $container
            ->expects($this->any())
            ->method('getParameterBag')
            ->will($this->returnValue($parameterBag));

        $extension = new WebmilFilepickerIoExtension();
        $configs = array(
            array('api_key' => 'foo'),
        );
        $extension->load($configs, $container);
    }
}
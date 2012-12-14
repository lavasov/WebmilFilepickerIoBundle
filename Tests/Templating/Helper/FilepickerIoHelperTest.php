<?php

namespace Webmil\FilepickerIoBundle\Test\Templating\Helper;

use Webmil\FilepickerIoBundle\Templating\Helper\FilepickerIoHelper;

class FilepickerIoHelperTest extends \PHPUnit_Framework_TestCase
{

    /**
	* @covers Webmil\FilepickerIoBundle\Templating\Helper\FilepickerIoHelper::getName
	*/
	public function testGetName()
	{
        $templating = $this->getMock('Symfony\Component\Templating\EngineInterface');
        $helper = new FilepickerIoHelper($templating, 'foo');
		$this->assertSame('filepickerIo', $helper->getName());
	}


    /**
	* @covers Webmil\FilepickerIoBundle\Templating\Helper\FilepickerIoHelper::initialize
	*/
	public function testInitialize()
	{
        $renderedTemplate = new \stdClass();
        $templating = $this->getMock('Symfony\Component\Templating\EngineInterface');
        $templating
            ->expects($this->once())
            ->method('render')
            ->with('WebmilFilepickerIoBundle::initialize.html.twig', array('apiKey' => 'foo'))
            ->will($this->returnValue($renderedTemplate));
        $helper = new FilepickerIoHelper($templating, 'foo');

        $this->assertSame($renderedTemplate, $helper->initialize());
	}
}
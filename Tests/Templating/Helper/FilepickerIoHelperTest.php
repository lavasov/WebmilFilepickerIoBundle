<?php

namespace Webmil\FilepickerIoBundle\Test\Templating\Helper;

use Webmil\FilepickerIoBundle\Templating\Helper\FilepickerIoHelper;

/**
 * @author Oleksandr Lavasov <imsashko@gmail.com>
 */
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

    /**
     * @covers Webmil\FilepickerIoBundle\Templating\Helper\FilepickerIoHelper::saveButton
     */
    public function testSaveButton()
    {
        $renderedTemplate = new \stdClass();
        $templating = $this->getMock('Symfony\Component\Templating\EngineInterface');
        $templating
            ->expects($this->once())
            ->method('render')
            ->with('WebmilFilepickerIoBundle::save_button.html.twig')
            ->will($this->returnValue($renderedTemplate));
        $helper = new FilepickerIoHelper($templating, 'foo');

        $this->assertSame($renderedTemplate, $helper->saveButton('url'));
    }

    /**
     * @covers Webmil\FilepickerIoBundle\Templating\Helper\FilepickerIoHelper::filepickerImageTag
     */
    public function testFilepickerImageTag()
    {
        $renderedTemplate = new \stdClass();
        $templating = $this->getMock('Symfony\Component\Templating\EngineInterface');
        $templating
            ->expects($this->once())
            ->method('render')
            ->with('WebmilFilepickerIoBundle::image_tag.html.twig')
            ->will($this->returnValue($renderedTemplate));
        $helper = new FilepickerIoHelper($templating, 'foo');

        $this->assertSame($renderedTemplate, $helper->imageTag('imageUrlHere', array('h' => '123', 'wer'=>'123'), array()));
    }
}
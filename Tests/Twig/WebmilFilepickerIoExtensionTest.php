<?php
namespace Webmil\FilepickerIoBundle\Test\Twig;

use Webmil\FilepickerIoBundle\Twig\WebmilFilepickerIoExtension;

/**
 * @author Oleksandr Lavasov <imsashko@gmail.com>
 */
class WebmilFilepickerIoExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
    * @covers Webmil\FilepickerIoBundle\Twig\WebmilFilepickerIoExtension::getName
    */
    public function testGetName()
    {
        $templating = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $extension = new WebmilFilepickerIoExtension($templating, 'foo');
        $this->assertSame('webmil_filepicker_io_extension', $extension->getName());
    }

    /**
    * @covers Webmil\FilepickerIoBundle\Twig\WebmilFilepickerIoExtension::getFunctions
    */
    public function testGetFunctions()
    {
        $containerMock = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $extension = new WebmilFilepickerIoExtension($containerMock);
        $functions = $extension->getFunctions();
        $this->assertInstanceOf('\Twig_Function_Method', $functions['filepicker_io_initialize']);
        $this->assertInstanceOf('\Twig_Function_Method', $functions['filepicker_io_save_button']);
    }

    /**
    * @covers Webmil\FilepickerIoBundle\Twig\WebmilFilepickerIoExtension::filepickerIoInitialize
    */
    public function testFilepickerIoInitialize()
    {
        $renderedTemplate = 'foo';
        $helperMock = $this->getMockBuilder('Webmil\FilepickerIoBundle\Templating\Helper\FilepickerIoHelper')
            ->disableOriginalConstructor()
            ->getMock();
        $helperMock->expects($this->once())
            ->method('initialize')
            ->will($this->returnValue($renderedTemplate));

        $containerMock = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $containerMock->expects($this->once())
            ->method('get')
            ->with('webmil_filepicker_io.helper')
            ->will($this->returnValue($helperMock));

        $extension = new WebmilFilepickerIoExtension($containerMock);

        $this->assertSame($renderedTemplate, $extension->filepickerIoInitialize());
    }

    /**
     * @covers Webmil\FilepickerIoBundle\Twig\WebmilFilepickerIoExtension::filepickerIoSaveButton
     */
    public function testFilepickerIoSaveButton()
    {
        $renderedTemplate = 'foo';
        $helperMock = $this->getMockBuilder('Webmil\FilepickerIoBundle\Templating\Helper\FilepickerIoHelper')
            ->disableOriginalConstructor()
            ->getMock();
        $helperMock->expects($this->once())
            ->method('saveButton')
            ->will($this->returnValue($renderedTemplate));

        $containerMock = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $containerMock->expects($this->once())
            ->method('get')
            ->with('webmil_filepicker_io.helper')
            ->will($this->returnValue($helperMock));

        $extension = new WebmilFilepickerIoExtension($containerMock);

        $this->assertSame($renderedTemplate, $extension->filepickerIoSaveButton('test'));
    }

    /**
     * @covers Webmil\FilepickerIoBundle\Twig\WebmilFilepickerIoExtension::filepickerImageTag
     */
    public function testFilepickerImageTag()
    {
        $renderedTemplate = 'foo';
        $helperMock = $this->getMockBuilder('Webmil\FilepickerIoBundle\Templating\Helper\FilepickerIoHelper')
            ->disableOriginalConstructor()
            ->getMock();
        $helperMock->expects($this->once())
            ->method('imageTag')
            ->will($this->returnValue($renderedTemplate));

        $containerMock = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $containerMock->expects($this->once())
            ->method('get')
            ->with('webmil_filepicker_io.helper')
            ->will($this->returnValue($helperMock));

        $extension = new WebmilFilepickerIoExtension($containerMock);

        $this->assertSame($renderedTemplate, $extension->filepickerImageTag('test'));
    }
}
<?php

namespace Webmil\FilepickerIoBundle\Tests\Form\Type;

use Webmil\FilepickerIoBundle\Form\Type\FilepickerType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Forms;

/**
 * @author Oleksandr Lavasov <imsashko@gmail.com>
 */
class FilepickerTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    protected $factory;

    /**
     * @var FilepickerType
     */
    protected $type;

    /**
     * @var FormBuilder
     */
    protected $builder;

    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    public function setUp()
    {
        $this->type = new FilepickerType();

        $this->factory = Forms::createFormFactoryBuilder()
            ->addType(new FilepickerType())
            ->getFormFactory();

        $this->dispatcher = $this->getMock('Symfony\Component\EventDispatcher\EventDispatcherInterface');
        $this->builder = new FormBuilder(null, null, $this->dispatcher, $this->factory);
    }

    public function testGetName()
    {
        $this->assertEquals('filepicker', $this->type->getName());
    }

    public function testGetParent()
    {
        $this->assertEquals('text', $this->type->getParent());
    }

    public function testDefaultType()
    {
        $form = $this->factory->create('filepicker');
        $view = $form->createView();

        $this->assertEquals('filepicker', $view->vars['type']);
    }

    public function testDragDropType()
    {
        $form = $this->factory->create('filepicker', null, array('dragdrop' => true));
        $view = $form->createView();

        $this->assertEquals('filepicker-dragdrop', $view->vars['type']);
    }
}
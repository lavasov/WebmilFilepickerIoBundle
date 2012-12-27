<?php
namespace Webmil\FilepickerIoBundle\Tests\Form\Type;

use Webmil\FilepickerIoBundle\Form\Type\FilepickerType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Forms;

class FilepickerTypeTest extends \PHPUnit_Framework_TestCase
{
    protected $factory;
    protected $type;

    public function setUp()
    {
        $this->type = new FilepickerType();
    }

    public function testGetName()
    {
        $this->assertEquals('filepicker', $this->type->getName());
    }

    public function testGetParent()
    {
        $this->assertEquals('text', $this->type->getParent());
    }

    public function testDefaultOptions()
    {
        $this->markTestIncomplete('Not yet implemented');
    }
}
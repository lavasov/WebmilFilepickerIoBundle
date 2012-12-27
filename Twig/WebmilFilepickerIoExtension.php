<?php

namespace Webmil\FilepickerIoBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class WebmilFilepickerIoExtension extends \Twig_Extension
{

    protected $container;

    /**
    * Constructor.
    *
    * @param ContainerInterface $container
    */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'filepicker_io_initialize' => new \Twig_Function_Method($this, 'filepickerIoInitialize', array('is_safe' => array('html'))),
            'filepicker_io_save_button' => new \Twig_Function_Method($this, 'filepickerIoSaveButton', array('is_safe' => array('html')))
        );
    }

    public function filepickerIoInitialize()
    {
        return $this->container->get('webmil_filepicker_io.helper')->initialize();
    }

    public function filepickerIoSaveButton($text, $url, $mimetype, $options)
    {
        return $this->container->get('webmil_filepicker_io.helper')->saveButton($text, $url, $mimetype, $options);
    }

    public function getName()
    {
        return 'webmil_filepicker_io_extension';
    }
}
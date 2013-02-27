<?php

namespace Webmil\FilepickerIoBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @author Oleksandr Lavasov <imsashko@gmail.com>
 */
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
            'filepicker_io_save_button' => new \Twig_Function_Method($this, 'filepickerIoSaveButton', array('is_safe' => array('html'))),
            'filepicker_io_image_tag' => new \Twig_Function_Method($this, 'filepickerImageTag', array('is_safe' => array('html')))
        );
    }

    public function filepickerIoInitialize()
    {
        return $this->container->get('webmil_filepicker_io.helper')->initialize();
    }

    public function filepickerIoSaveButton($url, $text = 'Save File', $mimetype = 'text/plain', $options = array())
    {
        return $this->container->get('webmil_filepicker_io.helper')->saveButton($url, $text, $mimetype, $options);
    }

    public function filepickerImageTag($imageUrl, array $options = array(), array $attributes = array())
    {
        return $this->container->get('webmil_filepicker_io.helper')->imageTag($imageUrl, $options, $attributes);
    }

    public function getName()
    {
        return 'webmil_filepicker_io_extension';
    }
}
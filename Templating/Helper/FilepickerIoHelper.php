<?php

namespace Webmil\FilepickerIoBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;

/**
 * @author Oleksandr Lavasov <imsashko@gmail.com>
 */
class FilepickerIoHelper extends Helper
{
    protected $templating;
    protected $apiKey;

    public static $allowedImageOptions = array('w', 'h', 'fit', 'crop', 'align', 'format', 'quality', 'watermark', 'watersize', 'waterposition');

    public function __construct(EngineInterface $templating, $apiKey)
    {
        $this->templating = $templating;
        $this->apiKey = $apiKey;
    }

    public function initialize()
    {
        $tmplName = 'WebmilFilepickerIoBundle::initialize.html.twig';

        return $this->templating->render($tmplName, array(
            'apiKey' => $this->apiKey,
        ));
    }

    public function saveButton($url, $text = 'Save File', $mimetype = 'text/plain', array $options = array())
    {
        $inputPrams = array('text' => $text);
        $inputPrams['data'] = array(
            'data-fp-url' => $url,
            'data-fp-apikey' => array_key_exists('data-fp-apikey', $options) ? $options['data-fp-apikey'] : '',
            'data-fp-mimetype' => $mimetype,
            'data-fp-extension' => array_key_exists('data-fp-extension', $options) ? $options['data-fp-extension'] : '',
            'data-fp-container' => array_key_exists('data-fp-container', $options) ? $options['data-fp-container'] : '',
            'data-fp-service' => array_key_exists('data-fp-service', $options) ? $options['data-fp-service'] : '',
            'data-fp-services' => array_key_exists('data-fp-services', $options) ? explode(',', $options['data-fp-services']) : '',
            'data-fp-suggestedFilename' => array_key_exists('data-fp-suggestedFilename', $options) ? $options['data-fp-suggestedFilename'] : '',
            );
        $tmplName = 'WebmilFilepickerIoBundle::save_button.html.twig';

        return $this->templating->render($tmplName, $inputPrams);
    }

    public function imageTag($imageUrl, array $options, array $attributes)
    {
        //Filter and leave only allowed params
        $options = array_intersect_key($options, array_flip(self::$allowedImageOptions));
        $imageUrl .= "/convert?".http_build_query($options);

        $tmplName = 'WebmilFilepickerIoBundle::image_tag.html.twig';

        return $this->templating->render($tmplName, array('imageUrl' => $imageUrl, 'attributes' => $attributes));
    }

    public function getName()
    {
        return 'filepickerIo';
    }
}
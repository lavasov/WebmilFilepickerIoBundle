<?php

namespace Webmil\FilepickerIoBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;

class FilepickerIoHelper extends Helper
{
    protected $templating;
    protected $apiKey;

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

    public function saveButton($text, $url, $mimetype, $options)
    {
        $inputPrams = array(
            'data-fp-url' => ,
            'data-fp-apikey' => ,
            'data-fp-mimetype' => ,
            'data-fp-extension' => ,
            'data-fp-container' => ,
            'data-fp-service' => ,
            'data-fp-services' => ,
            'data-fp-suggestedFilename' => ,
            );
        $tmplName = 'WebmilFilepickerIoBundle::save_button.html.twig';

        return $this->templating->render($tmplName, $inputPrams);
    }

    /**
    * @codeCoverageIgnore
    */
    public function getName()
    {
        return 'filepickerIo';
    }
}
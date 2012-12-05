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
			// 'sync'=> $sync
		));
    }

    /**
    * @codeCoverageIgnore
    */
    public function getName()
    {
        return 'filepickerIo';
    }
}
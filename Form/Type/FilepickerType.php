<?php

namespace Webmil\FilepickerIoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

/**
 * @author Oleksandr Lavasov <imsashko@gmail.com>
 */
class FilepickerType extends AbstractType
{
    /**
    * {@inheritdoc}
    */
    public function buildView(FormView $view, FormInterface $form)
    {}

    /**
    * {@inheritdoc}
    */
    public function getName()
    {
        return 'filepicker';
    }

    /**
    * {@inheritdoc}
    */
    public function getParent(array $options)
    {
        return 'text';
    }
}
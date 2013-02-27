<?php

namespace Webmil\FilepickerIoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Oleksandr Lavasov <imsashko@gmail.com>
 */
class FilepickerType extends AbstractType
{
    /**
    * {@inheritdoc}
    */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['type'] = ($options['dragdrop'] == true) ? 'filepicker-dragdrop' : 'filepicker';
    }

    /**
    * {@inheritdoc}
    */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'dragdrop' => false,
        ));
    }

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
    public function getParent()
    {
        return 'text';
    }
}
<?php

namespace Webmil\FilepickerIoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
// use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FilepickerType extends AbstractType
{

    /**
    * {@inheritdoc}
    */
    public function buildView(FormView $view, FormInterface $form)
    {
        // $view->vars['type'] = ($options['dragdrop'] == true) ? 'filepicker-dragdrop' : 'filepicker';
        // $view->vars['value'] = $options['value'];
    }

    /**
    * {@inheritdoc}
    */
    // public function setDefaultOptions(OptionsResolverInterface $resolver)
    // {
    //     $resolver->setDefaults(array(
    //         'dragdrop' => false,
    //         'value' => '',
    //     ));
    // }

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
<?php

/*
 * This file is part of the WSFormBundle package.
 *
 * (c) Benjamin Georgeault <https://github.com/WedgeSama/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace WS\FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class CollectionType extends AbstractType {

    public function buildView(FormView $view, FormInterface $form, 
        array $options) {
        $view->vars['translation_modal'] = $options['translation_modal'];
        $view->vars['prototype_name'] = $options['prototype_name'];
        $view->vars['order'] = $options['order'];
        $view->vars['handler'] = $options['handler'];
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(
                array(
                        'allow_add' => true, 
                        'allow_delete' => true, 
                        'prototype' => true, 
                        'by_reference' => false, 
                        'translation_modal' => 'modal.suppr', 
                        'translation_domain' => 'WSTwigExtensionBundle', 
                        'prototype_name' => '__name__',
                        'order' => false,
                        'handler' => 'legend'
                ));
    }

    public function getName() {
        return 'ws_collection';
    }

    public function getParent() {
        return 'collection';
    }

}

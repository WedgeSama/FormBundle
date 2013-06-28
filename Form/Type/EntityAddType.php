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

class EntityAddType extends AbstractType {

	public function buildView(FormView $view, FormInterface $form, array $options) {
		$view->vars['translation_modal'] = $options['translation_modal'];
		$view->vars['iframe_path'] = $options['iframe_path'];
		$view->vars['iframe_path_vars'] = $options['iframe_path_vars'];
		$view->vars['ajax_path'] = $options['ajax_path'];
		$view->vars['ajax_path_vars'] = $options['ajax_path_vars'];
		$view->vars['property'] = $options['property'];
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array (
				'iframe_path' => '',
				'iframe_path_vars' => array (),
				'ajax_path' => '',
				'ajax_path_vars' => array (),
				'translation_modal' => 'modal.iframe',
				'translation_domain' => 'WSTwigExtensionBundle' 
		));
	}

	public function getName() {
		return 'ws_entity_add';
	}

	public function getParent() {
		return 'genemu_jqueryselect2_entity';
	}

}

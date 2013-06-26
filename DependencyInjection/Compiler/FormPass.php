<?php

/*
 * This file is part of the WSFormBundle package.
 *
 * (c) Benjamin Georgeault <https://github.com/WedgeSama/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WS\FormBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FormPass implements CompilerPassInterface {

	/**
     * {@inheritdoc}
     */
	public function process(ContainerBuilder $container) {
		$resources = $container->getParameter('twig.form.resources');
		
		$resources[] = 'WSFormBundle:Form:js_layout.html.twig';
		$resources[] = 'WSFormBundle:Form:div_layout.html.twig';
		
		$container->setParameter('twig.form.resources', $resources);
	}

}

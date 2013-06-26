<?php

namespace WS\FormBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use WS\FormBundle\DependencyInjection\Compiler\FormPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class WSFormBundle extends Bundle {

	public function build(ContainerBuilder $container) {
		parent::build($container);
		$container->addCompilerPass(new FormPass());
	}

}

<?php

namespace WS\FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CollectionItemType extends AbstractType {

	public function getName() {
		return 'ws_collection_item';
	}

}

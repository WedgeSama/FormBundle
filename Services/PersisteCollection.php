<?php

/*
 * This file is part of the WSFormBundle package.
 *
 * (c) Benjamin Georgeault <https://github.com/WedgeSama/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WS\FormBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManager;

class PersisteCollection {

	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	private $_em;

	public function __construct(EntityManager $entityManager) {
		$this->_em = $entityManager;
	}

	public function stockColl($list) {
		$res = array ();
		foreach ($list as $elem)
			$res[] = $elem;
		
		return $res;
	}

	public function doColl($entity, $originalElems, $champ, $type = 'MO') {
		$champ = ucfirst($champ);
		$methodGet = 'get' . $champ;
		$methodRm = 'remove' . substr($champ, 0, - 1);
		$nomClasse = get_class($entity);
		
		foreach ($entity->$methodGet() as $elem) {
			foreach ($originalElems as $key => $toDel) {
				if ($toDel->getId() === $elem->getId()) {
					unset($originalElems[$key]);
				}
			}
		}
		
		switch ($type) {
			case 'MM' : // cas ManyToMany
				$methodGet2 = 'get' . $nomClasse . 's';
				
				foreach ($originalElems as $elem) {
					$elem->$methodGet2()
						->removeElement($entity);
					$this->_em->persist($elem);
				}
				break;
			case 'MO' : // cas ManyToOne non null
				foreach ($originalElems as $elem) {
					$entity->$methodRm($elem);
					$this->_em->remove($elem);
				}
				break;
			case 'MON' : // cas ManyToOne pouvant etre null
				$methodGet2 = 'set' . $nomClasse;
				
				foreach ($originalElems as $elem) {
					$elem->$methodGet2(null);
					$this->_em->persist($elem);
				}
				break;
		}
	}

}

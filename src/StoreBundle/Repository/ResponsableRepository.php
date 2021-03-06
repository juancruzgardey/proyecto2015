<?php

namespace StoreBundle\Repository;

use StoreBundle\Entity\Responsable;

/**
 * ResponsableRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ResponsableRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function responsablesAsignables () {
		$query = $this->getEntityManager()->createQuery('SELECT r FROM StoreBundle\Entity\Responsable r WHERE r.id NOT IN (SELECT rep.id FROM StoreBundle\Entity\Responsable rep 
				JOIN rep.usuario u)');
		return $query->getResult();
	}

	public function listarTodos(&$pagina,&$cantidadDePaginas) {
		$query = $this->getEntityManager()->createQuery('SELECT r from StoreBundle\Entity\Responsable r WHERE r.borrado=false ORDER BY r.apellido ASC');
		$cantidadTotal = count($query->getResult());
		$configuracion = $this->getEntityManager()->getRepository('StoreBundle:Configuracion')->findOneBy(array('clave' => 'elementosPorPagina' ));
		$elementosPorPagina = (int) $configuracion->getValor();
		if ($cantidadTotal==0) {
			$cantidadDePaginas = 1;
		}
		else {
			$cantidadDePaginas = ceil($cantidadTotal / $elementosPorPagina);
		}
		if ((int) $pagina < 1 || $pagina > $cantidadDePaginas) {
			$pagina = 1;
		}
		$primerResponsable = ($pagina -1) * $elementosPorPagina;
		$query->setFirstResult($primerResponsable);
		$query->setMaxResults($elementosPorPagina);
		return $query->getResult();
	}

}

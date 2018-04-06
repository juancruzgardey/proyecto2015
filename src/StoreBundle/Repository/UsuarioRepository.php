<?php

namespace StoreBundle\Repository;

/**
 * UsuarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuarioRepository extends \Doctrine\ORM\EntityRepository
{

	public function listarTodos(&$pagina,&$cantidadDePaginas) {
		$query = $this->getEntityManager()->createQuery('SELECT u from StoreBundle\Entity\Usuario u WHERE u.borrado=false ORDER BY u.username ASC');
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
		$primerUsuario = ($pagina -1) * $elementosPorPagina;
		$query->setFirstResult($primerUsuario);
		$query->setMaxResults($elementosPorPagina);
		return $query->getResult();
	}
}

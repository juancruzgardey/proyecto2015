<?php
	namespace AppBundle\Controller;

	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

	class SecurityController extends Controller {

		/**
		* @Route("/login", name="login")
		*
		*/
		public function loginAction(Request $request) {

			$authenticationUtils = $this->get('security.authentication_utils');

			//obtener los errores de autenticación si es que lo hay
			$error = $authenticationUtils->getLastAuthenticationError();

			$lastUsername = $authenticationUtils->getLastUsername();
			return $this->render('security/login.html.twig',array('last_username' => $lastUsername, 'error' => $error));
		}
	}
<?php
switch ($action)
{
	case "Verification":
		// Assigner les valeurs du formulaire à $_SESSION
		$_SESSION['role'] = $_POST['role'];
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['pwd'] = $_POST['pwd'];

		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$existe = $this->maBD->verifExistance($_SESSION['role'], $_SESSION['login'], $_SESSION['pwd']);
		$vue->AfficherMenuContextuel($_SESSION['role'], $existe, $liste);

		echo $_SESSION['role'];
		echo $_SESSION['login'] ;
		echo $_SESSION['pwd'] ;
		echo $existe;

		break;
	case "Deconnexion":
		session_destroy();
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuInternaute($liste);
		break;
}

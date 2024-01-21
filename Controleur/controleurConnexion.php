<?php
switch ($action)
{
	case "Verification":
		// Vérifier si la clé "role" est définie dans $_POST
		if (isset($_POST['role']))
		{
			// Assigner les valeurs du formulaire à $_SESSION
			$_SESSION['role'] = $_POST['role'];
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['pwd'] = $_POST['pwd'];

			// Vérifier si toutes les clés nécessaires sont définies dans $_SESSION
			if (isset($_SESSION['role'], $_SESSION['login'], $_SESSION['pwd']))
			{
				$vue = new vueCentraleConnexion();
				$liste = $this->maBD->afficheListeSelect();
				$existe = $this->maBD->verifExistance($_SESSION['role'], $_SESSION['login'], $_SESSION['pwd']);

				if ($existe)
				{
					$vue->AfficherMenuContextuel($_SESSION['role'], $existe, $liste);
				}
				else
				{
					$vue->afficheMenuInternaute($liste);
					$vue->mauvaisIdentifiant();
				}
			}
			else
			{
				// Gérer le cas où certaines clés ne sont pas définies dans $_SESSION
				$vue = new vueCentraleConnexion();
				$liste = $this->maBD->afficheListeSelect();
				$vue->afficheMenuInternaute($liste);
				$vue->ManqueChamp();
			}
		}
		else
		{
			// Gérer le cas où "role" n'est pas défini dans $_POST
			$vue = new vueCentraleConnexion();
			$liste = $this->maBD->afficheListeSelect();
			$vue->afficheMenuInternaute($liste);
			$vue->champRole();
		}
		break;
	case "Deconnexion":
		session_destroy();
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuInternaute($liste);
		break;
}

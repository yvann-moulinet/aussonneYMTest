<?php
switch ($action)
{
	case "ajouter":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$vue = new vueCentraleAdherent();

		break;
	case "visualiser":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuInternaute($liste);
		$message = $this->tousLesAdherents->listeDesAdherents();
		$vue = new vueCentraleAdherent();
		$vue->visualiserAdherent($message);
		break;
	case "modifier":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		//a faire;
		break;
	case "modifierSonProfil":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdherent($liste);
		$vue = new vueCentraleAdherent();
		$vue->modifierSonProfilAdherent();
		$result = $this->verifierMotDePasse();
		if ($result == 1)
		{
			echo '<p>Le mot de passe est valide</p>';
			$_SESSION['pwd'] = $_POST['npass'];
			$this->maBD->modifyPassword($_SESSION['role'], $_SESSION['login'], $_SESSION['pwd']);
		}
		break;
	case "voyager":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdherent($liste);
		$vue = new vueCentraleAdherent();
		$vue->voyagerAdherent();
		break;
	case "informationProfil":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdherent($liste);
		$id = $this->tousLesAdherents->infoAdherent();
		$idAdherent = $this->tousLesAdherents->idAdherent();
		$coequipier = $this->maBD->afficheCoequipier($idAdherent);
		$vue = new vueCentraleAdherent();
		$vue->informationAdherent($id, $coequipier);
		break;
}

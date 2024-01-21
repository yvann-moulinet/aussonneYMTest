<?php
switch ($action)
{
	case "ajouter":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$vue = new vueCentraleAdherent();
		$listeEquipe = $this->toutesLesEquipes->lesEquipesAuFormatHTMLMultiple();
		$vue->saisirAdherents($listeEquipe);
		break;

	case "enregistrer":
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$age = $_POST['age'];
		$sexe = $_POST['sexe'];
		$login = $_POST['login'];
		$pwd = $_POST['pwd'];
		$listeEquipe = $_POST['idEquipe'];
		$this->maBD->insertAdherent($nom,$prenom,$age,$sexe,$login,$pwd);
		$trigger = $this->maBD->insertPouvoir($listeEquipe);
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$vue = new vueCentraleAdherent();
		if ($trigger)
		{
			$vue->messageRequeteTrigger();
		}
		else
		{
			$vue->messageRequeteInsert();
		}
		break;

	case "modifier":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$vue = new vueCentraleAdherent();
		$liste = $this->tousLesAdherents->lesAdherentsAuFormatHTML();
		$vue->modifierAdherent($liste);
		break;

	case "saisirModif":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$vue = new vueCentraleAdherent();
		$idAdherent = $_POST['idAdherent'];
		$listeEquipe = $this->toutesLesEquipes->lesEquipesAuFormatHTMLmultiple(); 
		$lAdherent = $this->tousLesAdherents->donneObjetAdherentDepuisNumero($idAdherent);
		$vue->saisirModifAdherent($lAdherent->idAdherent, $lAdherent->nomAdherent, $lAdherent->prenomAdherent, $lAdherent->ageAdherent, $lAdherent->loginAdherent, $lAdherent->pwdAdherent, $listeEquipe);
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
	case "visualiser":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuInternaute($liste);
		$message = $this->tousLesAdherents->listeDesAdherents();
		$vue = new vueCentraleAdherent();
		$vue->visualiserAdherent($message);
		break;
}

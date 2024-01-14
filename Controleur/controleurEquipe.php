<?php
switch ($action)
{
	case "ajouter":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$vue = new vueCentraleEquipe();
		$listeSpecialite = $this->toutesLesSpecialites->lesSpecialitesAuFormatHTML();
		$listeEntraineur = $this->tousLesEntraineurs->lesEntraineursAuFormatHTML();
		$vue->saisirEquipe($listeSpecialite, $listeEntraineur);
		break;
	case 'enregistrer':
		$nomEquipe = $_POST['nomEquipe'];
		$placeEquipe = $_POST['placeEquipe'];
		$ageMin = $_POST['ageMin'];
		$ageMax = $_POST['ageMax'];
		$sexEquipe = $_POST['sexEquipe'];
		$idSpecialites = $_POST['idSpecialite'];
		$idEntraineur = $_POST['idEntraineur'];
		$vacataire = $this->tousLesVacataires->chercherExistanceIdVacataire($idEntraineur);
		if ($vacataire)
		{
			$this->toutesLesEquipes->ajouterUneEquipe($this->maBD->donneProchainIdentifiant("EQUIPE") + 1, $nomEquipe, $placeEquipe, $ageMin, $ageMax, $sexEquipe, $this->toutesLesSpecialites->donneObjetSpecialiteDepuisNumero($idSpecialites), $this->tousLesVacataires->donneObjetVacataireDepuisNumero($idEntraineur));
		}
		else
		{
			$this->toutesLesEquipes->ajouterUneEquipe($this->maBD->donneProchainIdentifiant("EQUIPE") + 1, $nomEquipe, $placeEquipe, $ageMin, $ageMax, $sexEquipe, $this->toutesLesSpecialites->donneObjetSpecialiteDepuisNumero($idSpecialites), $this->tousLesTitulaires->donneObjetTitulaireDepuisNumero($idEntraineur));
		}
		$this->maBD->insertEquipe($nomEquipe, $placeEquipe, $ageMin, $ageMax, $sexEquipe, $idSpecialites, $idEntraineur);
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$vue = new vueCentraleEquipe();
		$vue->messageRequeteCréation();

		break;
	case "visualiser":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuInternaute($liste);
		$message = $this->toutesLesEquipes->listeDesEquipes();
		$vue = new vueCentraleEquipe();
		$vue->visualiserEquipe($message);
		break;
	case "modifier":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$vue = new vueCentraleEquipe();
		break;
}

<?php
switch ($action)
{
	case "ajouter":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$vue = new vueCentraleEntraineur();
		$vue->ajouterEntraineur();

		break;
	case 'SaisirEntraineur':
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$typeEntraineur = $_POST['typeEntraineur'];
		$vue = new vueCentraleEntraineur();
		$listeSpecialite = $this->toutesLesSpecialites->checkboxSpecialiteAuFormatHTML();
		$vue->saisirEntraineur($listeSpecialite);
		break;
	case 'enregistrer':
		$typeEntraineur = $_POST['typeEntraineur'];
		$telEntraineur = null;
		$nomEntraineur = null;
		if ($typeEntraineur == "Vacataire")
		{
			$nomEntraineur = $_POST['nomEntraineur'];
			$loginEntraineur = $_POST['loginEntraineur'];
			$pwdEntraineur = $_POST['pwdEntraineur'];
			$telEntraineur = $_POST['numTelVacataire'];
			$listeSpecialites = array(); //cette liste contient les id des spécialités du nouvel entraineur 
			for ($i = 0; $i < $this->toutesLesSpecialites->nbSpecialite(); $i++)
			{
				if (isset($_POST['idSpecialite' . $i + 1]))
				{
					array_push($listeSpecialites, $i + 1);
				}
			}
			$this->tousLesVacataires->ajouterUnVacataire($this->maBD->donneProchainIdentifiant("ENTRAINEUR") + 1, $nomEntraineur, $loginEntraineur, $pwdEntraineur, $telEntraineur, new conteneurSpecialite($listeSpecialites));
			$this->maBD->insertVacataire($nomEntraineur, $loginEntraineur, $pwdEntraineur, $telEntraineur);
			$this->maBD->insertCompetent($listeSpecialites);
			$vue = new vueCentraleConnexion();
			$liste = $this->maBD->afficheListeSelect();
			$vue->afficheMenuAdmin($liste);
		}
		else
		{
			$nomEntraineur = $_POST['nomEntraineur'];
			$loginEntraineur = $_POST['loginEntraineur'];
			$pwdEntraineur = $_POST['pwdEntraineur'];
			$dateEmbEntraineur = $_POST['dateEmbaucheTitulaire'];
			$idSpecialite = $_POST['idSpecialite'];
			$this->tousLesTitulaires->ajouterUnTitulaire($this->maBD->donneProchainIdentifiant("ENTRAINEUR") + 1, $nomEntraineur,  $loginEntraineur, $pwdEntraineur, $dateEmbEntraineur, new conteneurSpecialite($idSpecialite));
			$this->maBD->insertTitulaire($nomEntraineur, $loginEntraineur, $pwdEntraineur, $dateEmbEntraineur, $idSpecialite);
			$vue = new vueCentraleConnexion();
			$liste = $this->maBD->afficheListeSelect();
			$vue->afficheMenuAdmin($liste);
		}
		break;
	case "visualiser":
		$vue = new vueCentraleConnexion();
		$vue->afficheMenuInternaute();
		$liste = $this->tousLesTitulaires->listeDesTitulaires();
		$liste = $liste . $this->tousLesVacataires->listeDesVacataires();
		$vue = new vueCentraleEntraineur();
		$vue->VisualiserEntraineur($liste);
		break;
	case "modifier":
		$vue = new vueCentraleConnexion();
		$vue->afficheMenuAdmin($liste);
		//reste à faire
		break;
	case "visualiserSesEquipes":
		$vue = new vueCentraleConnexion();
		$vue->afficheMenuEntraineur($liste);
		//reste à faire
		break;
	case "modifierSonProfil":
		$vue = new vueCentraleConnexion();
		$vue->afficheMenuEntraineur($liste);
		//reste à faire
		break;
}

<?php
switch ($action)
{
	case "ajouter":
		$vue = new vueCentraleConnexion();
		$liste = $this->maBD->afficheListeSelect();
		$vue->afficheMenuAdmin($liste);
		$listeEquipe = $this->toutesLesEquipes->lesEquipesAuFormatHTML();
		$vue = new vueCentraleEquipe();
		$listeSpecialite = $this->toutesLesSpecialites->lesSpecialitesAuFormatHTML();
		$listeEntraineur = $this->tousLesEntraineurs->lesEntraineursAuFormatHTML();
		$vue->saisirEquipe($listeSpecialite,$listeEntraineur);
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
		$listeEquipe = $this->toutesLesEquipes->lesEquipesAuFormatHTML();
		$vue = new vueCentraleEquipe();
		$vue->modifierEquipe($listeEquipe);
		break;

}

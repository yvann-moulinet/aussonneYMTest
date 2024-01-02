<?php
switch ($action)
			{
				case "ajouter":
					$vue=new vueCentraleConnexion();
					$liste = $this->maBD->afficheListeSelect();
					$vue->afficheMenuAdmin($liste);//J'ajoute une nouvelle specialite juste pour voir si cela fonctionne
					//mais la fonctionnalité reste à faire en réalité
					$this->toutesLesSpecialites->ajouterUneSpecialite($this->maBD->donneNumeroMaxSpecialite(),'Specialite essai',10,5,8,'F',$this->tousLesTitulaires->donneObjetTitulaireDepuisNumero(1));
					$this->maBD->insertSpecialite('Specialite essai',10,5,8,'F',1);			
					break;
				case "visualiser" :
					$vue=new vueCentraleConnexion();
					$liste = $this->maBD->afficheListeSelect();
					$vue->afficheMenuInternaute($liste);
					$message = $this->toutesLesSpecialites->listeDesSpecialites();
					$vue = new vueCentraleSpecialite();
					$vue->visualiserSpecialite($message);
					break;
				case "modifier" :
					$vue=new vueCentraleConnexion();
					$liste = $this->maBD->afficheListeSelect();
					$vue->afficheMenuAdmin($liste);
					$message= $this->toutesLesSpecialites->lesSpecialitesAuFormatHTML();
					$vue = new vueCentraleSpecialite();
					$vue->modifierSpecialite($message);
					break;
				case "choixFaitPourModif":
					$vue=new vueCentraleConnexion();
					$liste = $this->maBD->afficheListeSelect();
					$vue->afficheMenuAdmin($liste);
					$choix=$_GET['idSpecilite'];
					$lSpecialite=$this->toutesLesSpecialites->donneObjetSpecialiteDepuisNumero($choix);
					$vue = new vueCentraleSpecialite();
					$vue->choixFaitPourModifSpecialite($lSpecialite->nom,$lSpecialite->nbrPlaceSpecialite,$lSpecialite->ageMinSpecialite,$lSpecialite->ageMaxSpecialite,$lSpecialite->sexeSpecialite,$choix,$this->tousLesTitulaires->lesTitulairesAuFormatHTML());	
					break;
				case "EnregModif":
					$vue=new vueCentraleConnexion();
					$liste = $this->maBD->afficheListeSelect();
					$vue->afficheMenuAdmin($liste);
					$idSpecialite=$_GET['idSpecialite'];
					$nomSpecialite=$_GET['nomSpecialite'];
					$nbrPlaceEquipe=$_GET['nbrPlaceEquipe'];
					$ageMinEquipe=$_GET['ageMinEquipe'];
					$ageMaxEquipe=$_GET['ageMaxEquipe'];
					$sexeEquipe=$_GET['sexeEquipe'];
					$idTitulaire = $_GET['idTitulaire'];
					$leTitulaire = $this->tousLesTitulaires->donneObjetTitulaireDepuisNumero($idTitulaire);
					$this->maBD->modifSpecialite($idSpecialite,$nomSpecialite,$nbrPlaceEquipe,$ageMinEquipe,$ageMaxEquipe,$sexeEquipe,$idTitulaire);
					$this->toutesLesSpecialites->modifierUneSpecialite($idSpecialite, $nomSpecialite, $nbrPlaceEquipe, $ageMinEquipe, $ageMaxEquipe, $sexeEquipe, $leTitulaire);
					
			}
?>
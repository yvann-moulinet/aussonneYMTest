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
					$message = $this->toutesLesEquipes->listeDesEquipes();
					$vue = new vueCentraleEquipe();
					$vue->visualiserEquipe($message);
					break;
				case "modifier" :
					$vue=new vueCentraleConnexion();
					$liste = $this->maBD->afficheListeSelect();
					$vue->afficheMenuAdmin($liste);
					$message= $this->toutesLesEquipes->lesSpecialitesAuFormatHTML();
					$vue = new vueCentraleSpecialite();
					$vue->modifierSpecialite($message);
					break;
            }
?>
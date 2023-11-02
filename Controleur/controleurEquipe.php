<?php
switch ($action)
			{
				case "ajouter":
					$vue=new vueCentraleConnexion();
					$vue->afficheMenuAdmin();//J'ajoute une nouvelle specialite juste pour voir si cela fonctionne
					//mais la fonctionnalité reste à faire en réalité
					$this->toutesLesSpecialites->ajouterUneSpecialite($this->maBD->donneNumeroMaxSpecialite(),'Specialite essai',10,5,8,'F',$this->tousLesTitulaires->donneObjetTitulaireDepuisNumero(1));
					$this->maBD->insertSpecialite('Specialite essai',10,5,8,'F',1);			
					break;
				case "visualiser" :
					$vue=new vueCentraleConnexion();
					$vue->afficheMenuInternaute();
					$message = $this->toutesLesEquipes->listeDesEquipes();
					$vue = new vueCentraleEquipe();
					$vue->visualiserSpecialite($message);
					break;
				case "modifier" :
					$vue=new vueCentraleConnexion();
					$vue->afficheMenuAdmin();
					$message= $this->toutesLesSpecialites->lesSpecialitesAuFormatHTML();
					$vue = new vueCentraleSpecialite();
					$vue->modifierSpecialite($message);
					break;
            }
?>
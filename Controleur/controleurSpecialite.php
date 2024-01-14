<?php
switch ($action)
			{
				case "ajouter":
					$vue = new vueCentraleConnexion();
					$liste = $this->maBD->afficheListeSelect();
					$vue->afficheMenuAdmin($liste);
					$vue = new vueCentraleSpecialite();		
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
					$listeSpecialite= $this->toutesLesSpecialites->lesSpecialitesAuFormatHTML();
					$vue = new vueCentraleSpecialite();
					$vue->modifierSpecialite($listeSpecialite);
					break;
				case "saisirModif":
					$vue=new vueCentraleConnexion();
					$liste = $this->maBD->afficheListeSelect();
					$vue->afficheMenuAdmin($liste);
					$idSpecialite=$_POST['idSpecialite'];
					$lSpecialite=$this->toutesLesSpecialites->donneObjetSpecialiteDepuisNumero($idSpecialite);
					$vue = new vueCentraleSpecialite();
					$vue->saisirModifSpecialite($idSpecialite, $lSpecialite->nomSpecialite);	
					break;
				case "enregModif":
					$vue=new vueCentraleConnexion();
					$liste = $this->maBD->afficheListeSelect();
					$vue->afficheMenuAdmin($liste);
					$idSpecialite=$_POST['idSpecialite'];
					$nomSpecialite=$_POST['nomSpecialite'];
					$this->maBD->modifSpecialite($idSpecialite,$nomSpecialite,);
					$this->toutesLesSpecialites->modifierUneSpecialite($idSpecialite, $nomSpecialite);
					$vue = new vueCentraleSpecialite();
					$vue->messageRequeteModification();
					
			}
?>
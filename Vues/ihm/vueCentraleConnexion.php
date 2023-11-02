<?php
	
	class vueCentraleConnexion
	{
		public function __construct()
		{
			
		}
		
		public function AfficherMenuContextuel($role,$existe,$liste)
		{
			if($existe==1)
			{	switch($role)
				{
					case "2" : 
						$this->afficheMenuAdherent($liste);
						break;
					case "3" :
						$this->afficheMenuEntraineur($liste);
						break;
					case "1" : 
						$this->afficheMenuAdmin($liste);
						break;
				}
			}
			else
			{
				echo "Erreur de connexion";
				$this->afficheMenuInternaute();
			}
		}
		
		public function afficheMenuInternaute()
		{
			echo '<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuEntraineur" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Menu Entraîneur 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuEntraineur">
					<li><a class="dropdown-item" href=index.php?vue=Entraineur&action=visualiser>Visualiser les entraineurs</a></li>
				</ul>
			</div>
			<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuSpecialite" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Menu Specialite 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuSpecialite">
					<li><a class="dropdown-item" href=index.php?vue=Specialite&action=visualiser>Visualiser les équipes</a></li>
				</ul>
			</div>
			<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuAdherent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Menu Adherent 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuAdherent">
					<li><a class="dropdown-item" href=index.php?vue=Adherent&action=visualiser>Visualiser les Adherents</a></li>
				</ul>
			</div>
			<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuAdherent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Menu Equipe
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuAdherent">
					<li><a class="dropdown-item" href=index.php?vue=Adherent&action=visualiser>Visualiser les Equipes</a></li>
				</ul>
			</div>
			</div>	
			</div>
		<div class="container">
			<div class="row">
				<div class ="col-md-2 col-xs-12 infosComplementaires">';
					require "vues/ihm/connexion.php";
					require "vues/ihm/deconnexion.php";
					echo'<br> espace pour des infos complémentaires type les news le login, le password....';
					
				echo '</div>
				<div class="col-md-10 col-xs-12 ">';
						
		}
		public function afficheMenuAdherent($liste)
		{
			echo '<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuAdherent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Mon profil 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuAdherent">
					<li><a class="dropdown-item" href=index.php?vue=Adherent&action=modifierSonProfil>Modifier son profil</a></li>
					<li><a class="dropdown-item" href=index.php?vue=Adherent&action=informationProfil>Information profil</a></li>
				</ul>
			</div>
			<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuAdherent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Me déplacer 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuAdherent">
					<li><a class="dropdown-item" href=index.php?vue=Adherent&action=voyager>Aller en déplacement</a></li>
				</ul>
			</div>
			
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class ="col-md-2 col-xs-12 infosComplementaires">';
					require "vues/ihm/connexion.php";
					require "vues/ihm/deconnexion.php";
					echo'<br> espace pour des infos complémentaires type les news le login, le password....';
					echo '<p class ="pt-3"> '.$liste.' </p>';
				echo '</div>
				<div class="col-md-10 col-xs-12 align-items-center ">';
				
		}
		public function afficheMenuEntraineur($liste)
		{
			echo '<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuEntraineur" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Mon profil 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuEntraineur">
					<li><a class="dropdown-item" href=index.php?vue=Entraineur&action=modifierSonProfil>Modifier son profil</a></li>
					<li><a class="dropdown-item" href=index.php?vue=Adherent&action=modifierSonProfil>Information profil</a></li>
				</ul>
			</div>
			<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuEntraineur" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Mes sportifs 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuEntraineur">
					<li><a class="dropdown-item" href=index.php?vue=Entraineur&action=visualiserSesSpecialites>Visualiser ses Adherents</a></li>
				</ul>
			</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class ="col-md-2 col-xs-12 infosComplementaires">
					';
					require "vues/ihm/connexion.php";
					require "vues/ihm/deconnexion.php";
					echo'<br> espace pour des infos complémentaires type les news le login, le password....';
					echo $liste;
				echo '</div>
				<div class="col-md-10 col-xs-12 ">';
		}
		
		public function afficheMenuAdmin($liste)
		{
			echo'<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuEntraineur" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Menu Entraîneur 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuEntraineur">
					<li><a class="dropdown-item" href=index.php?vue=Entraineur&action=ajouter>Ajouter un Entraineur</a></li>
					<li><a class="dropdown-item" href=index.php?vue=Entraineur&action=modifier>Modifier un entraineur</a></li>
				</ul>
			</div>
			<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuSpecialite" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Menu Specialite 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuSpecialite">
					<li><a class="dropdown-item" href=index.php?vue=Specialite&action=ajouter>Ajouter une équipe</a></li>
					<li><a class=dropdown-item href=index.php?vue=Specialite&action=modifier>Modifier une équipe</a></li>
				</ul>
			</div>
			<div class="dropdown col">
				<button class="btn bg-transparent dropdown-toogle" type="button" id="menuAdherent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Menu Adherent 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="menuAdherent">
					<li><a class="dropdown-item" href=index.php?vue=Adherent&action=ajouter>Ajouter un Adherent</a></li>
					<li><a class="dropdown-item" href=index.php?vue=Adherent&action=modifier>Modifier un Adherent</a></li>
				</ul>
			</div></div>
		</div>
		<div class="container">
			<div class="row">
				<div class ="col-md-2 col-xs-12 infosComplementaires">';
					require "vues/ihm/connexion.php";
					require "vues/ihm/deconnexion.php";
					echo'<br> espace pour des infos complémentaires type les news le login, le password....';
					echo $liste;
				echo '</div>
				<div class="col-md-10 col-xs-12 ">';
				
		}
		
		
	}
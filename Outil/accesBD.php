<?php

class accesBD
{
	private $hote;
	private $login;
	private $passwd;
	private $base;
	private $conn;
	private $boolConnexion;

	// Nous construisons notre connexion
	public function __construct()
	{
		$this->hote = "localhost";
		$this->login = "root";
		$this->passwd = "";
		$this->base = "ym_aussonnetest";
		$this->connexion();
	}
	private function connexion()
	{
		try
		{
			$this->conn = new PDO("mysql:host=" . $this->hote . ";dbname=" . $this->base . ";charset=utf8", $this->login, $this->passwd);
			$this->boolConnexion = true;
		}
		catch (PDOException $e)
		{
			die("Connection à la base de données échouée" . $e->getMessage());
		}
	}
	// ON vérifie l'existance d'un utilisateur grace à son login et son password
	public function verifExistance($role, $login, $pwd)
	{
		try
		{
			// on utilise la fonction htmlspecialchars pour echapper les caractères spéciaux
			$login = htmlspecialchars($login);

			//on va mettre le mot de passe saisie en clair par l'utilisateur en crypé MD5 pour pouvoir le comparer à celui dans la base de données.
			$pwd = MD5($pwd);
			switch ($role)
			{	// On utilise la methode prepare pour se préminir des injections.    

				case "1":
					$requete = $this->conn->prepare("SELECT idAdmin FROM administrateur where loginAdmin = ? and pwdAdmin = ? ;");

					break;
				case "2":
					$requete = $this->conn->prepare("SELECT idAdherent FROM adherent where loginAdherent = ? and pwdAdherent = ? ;");
					break;
				case "3":
					$requete = $this->conn->prepare("SELECT idEntraineur FROM entraineur where loginEntraineur = ? and pwdEntraineur = ? ;");

					break;
			}

			$requete->bindValue(1, $login);
			$requete->bindValue(2, $pwd);
			$result = $requete->fetch(PDO::FETCH_NUM);

			if (isset($result))
			{
				//on va créer une ligne de log dans notre table logActionUtilisateur
				$requete = 'INSERT INTO logActionUtilisateur (action ,temps, idUtilisateur) VALUES (\'connexion\',\'' . date('d-m-y h:i:s') . '\',\'' . $login . '\');';
				$result = $this->conn->query($requete);

				return (1);
			}
			else
			{
				return (0);
			}
		}
		catch (PDOException $e)
		{
			die("erreur dans la requête de recherche du login et de password" . $e->getMessage());
		}
	}
	public function modifyPassword($role, $login, $pwd)
	{

		$pwd = MD5($pwd);
		switch ($role)
		{
			case "1":
				$requete = "UPDATE administrateur SET pwdAdmin = '" . $pwd . "' where loginAdmin =  '" . $login . "';";
				break;
			case "2":
				$requete = "UPDATE adherent SET pwdAdherent = '" . $pwd . "' where loginAdherent =  '" . $login . "';";
				break;
			case "3":
				$requete = "UPDATE entraineur SET pwdEntraineur = '" . $pwd . "' where loginEntraineur =  '" . $login . "';";
				break;
		}
		//prend requête envoie a la base
		$result = $this->conn->query($requete);
	}
	public function afficheListeSelect()
	{
		$liste = 'Selectionnez un théme
				<SELECT name =theme id =theme onchange=appelAjax()><option value="">--sélection--</option>';                 // le onchange permet d'appeler la fonction javascript quand on change la valeur et pas au chargement donc au debut la page est vide
		$requete = 'SELECT code, libelle FROM theme;';
		$result = $this->conn->query($requete);
		while ($row = $result->fetch(PDO::FETCH_OBJ))
		{
			$liste = $liste . '<OPTION value=' . $row->code . '>' . $row->libelle . '</OPTION>';
		};
		$liste = $liste . '</SELECT>';
		return $liste;
	}
	public function afficheListeDesNouvelleTous()
	{
		$tableauDesLI = array("", "");
		$requete = 'SELECT code, date, description, codeTheme FROM nouvelle;';
		$result = $this->conn->query($requete);
		while ($row = $result->fetch(PDO::FETCH_OBJ))
		{
			$tableauDesLI[$row->codeTheme - 1] = $tableauDesLI[$row->codeTheme - 1] . "<LI>" . $row->nom . "</LI>";
		}
		return $tableauDesLI;
	}
	public function afficheListeDesNouvelleAjax()
	{
		$requete = 'SELECT * FROM nouvelle WHERE codeTheme = ' . $_POST['ref'] . ';';
		$liste = '<table class="table table-striped table-bordered table-sm">
					<thead>
						<tr>
							<th>Nouvelle</th>
							<th>Date de parution</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>';
		$result = $this->conn->query($requete);
		while ($row = $result->fetch(PDO::FETCH_OBJ))
		{
			$liste .= '<tr>
						<td>' . $row->code . '</td>
						<td>' . $row->date . '</td>
						<td>' . $row->description . '</td>
					</tr>';
		}
		$liste .= '</tbody></table>';
		return $liste;
	}



	/******************************************************************************
	Nous avons toutes les fonctions d'insertion
	 *******************************************************************************/
	public function insertVacataire($unNomEntraineur, $unLoginEntraineur, $unPwdEntraineur, $unTelephone)
	{
		$sonId = $this->donneProchainIdentifiant("ENTRAINEUR", "idEntraineur");
		$requete = $this->conn->prepare("INSERT INTO ENTRAINEUR (idEntraineur,nomEntraineur,loginEntraineur,pwdEntraineur) VALUES (?,?,?,?)");
		$requete->bindValue(1, $sonId);
		$requete->bindValue(2, $unNomEntraineur);
		$requete->bindValue(3, $unLoginEntraineur);
		$requete->bindValue(4, $unPwdEntraineur);
		if (!$requete->execute())
		{
			die("Erreur dans insert Entraineur : " . $requete->errorCode());
		}

		$requete = $this->conn->prepare("INSERT INTO vacataire (idEntraineur,telephoneVacataire) VALUES (?,?)");
		$requete->bindValue(1, $sonId);
		$requete->bindValue(2, $unTelephone);
		if (!$requete->execute())
		{
			die("Erreur dans insert Vacataire : " . $requete->errorCode());
		}
		return $sonId;
	}

	public function insertTitulaire($unNomEntraineur, $unLoginEntraineur, $unPwdEntraineur, $uneDateEmbauche)
	{
		$sonId = $this->donneProchainIdentifiant("ENTRAINEUR", "idEntraineur");
		$requete = $this->conn->prepare("INSERT INTO ENTRAINEUR (idEntraineur,nomEntraineur,loginEntraineur,pwdEntraineur) VALUES (?,?,?,?)");
		$requete->bindValue(1, $sonId);
		$requete->bindValue(2, $unNomEntraineur);
		$requete->bindValue(3, $unLoginEntraineur);
		$requete->bindValue(4, $unPwdEntraineur);
		if (!$requete->execute())
		{
			die("Erreur dans insert Entraineur : " . $requete->errorCode());
		}
		echo 'une date d embauche : ' . $uneDateEmbauche;
		$requete = $this->conn->prepare("INSERT INTO titulaire (idEntraineur,dateEmbauche) VALUES (?,?)");
		$requete->bindValue(1, $sonId);
		$requete->bindValue(2, $uneDateEmbauche);
		if (!$requete->execute())
		{
			die("Erreur dans insert Titulaire : " . $requete->errorCode());
		}

		return $sonId;
	}

	public function insertSpecialite($unNomSpecialite, $unNbrPlaceEquipe, $unAgeMinEquipe, $unAgeMaxEquipe, $unSexeEquipe, $unIdEntraineur)
	{
		$sonId = $this->donneProchainIdentifiant("SPECIALITE", "idSpecialite");
		$requete = $this->conn->prepare("INSERT INTO SPECIALITE (idSpecialite,nomSpecialite,nbrPlaceEquipe,ageMinEquipe,ageMaxEquipe,sexeEquipe,idEntraineur) VALUES (?,?,?,?,?,?,?)");
		$requete->bindValue(1, $sonId);
		$requete->bindValue(2, $unNomSpecialite);
		$requete->bindValue(3, $unNbrPlaceEquipe);
		$requete->bindValue(4, $unAgeMinEquipe);
		$requete->bindValue(5, $unAgeMaxEquipe);
		$requete->bindValue(6, $unSexeEquipe);
		$requete->bindValue(7, $unIdEntraineur);
		if (!$requete->execute())
		{
			die("Erreur dans insert Specialite : " . $requete->errorCode());
		}
		return $sonId;
	}



	public function insertAdherent($unNomAdherent, $unPrenomAdherent, $unAgeAdherent, $unSexeAdherent, $unLoginAdherent, $unPwdAdherent, $unIdSpecialite)
	{
		$sonId = $this->donneProchainIdentifiant("ADHERENT", "idAdherent") + 1;
		$requete = $this->conn->prepare("INSERT INTO ADHERENT (idAdherent,nomAdherent, prenomAdherent, ageAdherent, sexeAdherent,loginAdherent, pwdAdherent,idSpecialite) VALUES (?,?,?,?,?,?,?,?)");
		$requete->bindValue(1, $sonId);
		$requete->bindValue(2, $unNomAdherent);
		$requete->bindValue(3, $unPrenomAdherent);
		$requete->bindValue(4, $unAgeAdherent);
		$requete->bindValue(5, $unSexeAdherent);
		$requete->bindValue(6, $unLoginAdherent);
		$requete->bindValue(7, $unPwdAdherent);
		$requete->bindValue(8, $unIdSpecialite);
		if (!$requete->execute())
		{
			die("Erreur dans insert Adherent : " . $requete->errorCode());
		}
		return $sonId;
	}

	/***********************************************************************************************
	méthode qui va permettre de modifier les éléments d'une équipe.
	 ***********************************************************************************************/
	public function modifSpecialite($idSpecialite, $unNomSpecialite, $unNbrPlaceEquipe, $unAgeMinEquipe, $unAgeMaxEquipe, $unSexeEquipe, $unIdEntraineur)
	{
		$requete = $this->conn->prepare("UPDATE specialite SET nomSpecialite = ?, nbrPlaceEquipe = ?, ageMinEquipe = ?, ageMaxEquipe = ?, sexeEquipe = ?, idEntraineur = ? where idSpecialite = ?");

		$requete->bindValue(1, $unNomSpecialite);
		$requete->bindValue(2, $unNbrPlaceEquipe);
		$requete->bindValue(3, $unAgeMinEquipe);
		$requete->bindValue(4, $unAgeMaxEquipe);
		$requete->bindValue(5, $unSexeEquipe);
		$requete->bindValue(6, $unIdEntraineur);
		$requete->bindValue(7, $idSpecialite);

		echo "La modification est effectuée.";

		if (!$requete->execute())
		{
			die("Erreur dans modif Specialite : " . $requete->errorCode());
		}
		return $idSpecialite;
	}

	/***********************************************************************************************
	C'est la fonction qui permet de charger les tables et de les mettre dans un tableau 2 dimensions. La petite fontions specialCase permet juste de psser des minuscules aux majuscules pour les noms des tables de la base de données
	 ************************************************************************************************/
	public function chargement($uneTable)
	{
		$lesInfos = null;
		$nbTuples = 0;
		$stringQuery = "SELECT * FROM ";
		$stringQuery = $this->specialCase($stringQuery, $uneTable);
		$query = $this->conn->prepare($stringQuery);
		if ($query->execute())
		{
			while ($row = $query->fetch(PDO::FETCH_NUM))
			{
				$lesInfos[$nbTuples] = $row;
				$nbTuples++;
			}
		}
		else
		{
			die('Problème dans chargement : ' . $query->errorCode());
		}
		return $lesInfos;
	}

	private function specialCase($stringQuery, $uneTable)
	{
		$uneTable = strtoupper($uneTable);
		switch ($uneTable)
		{
			case 'VACATAIRE':
				$stringQuery .= 'vacataire';
				break;
			case 'SPECIALITE':
				$stringQuery .= 'specialite';
				break;
			case 'ADHERENT':
				$stringQuery .= 'adherent';
				break;
			case 'ENTRAINEUR':
				$stringQuery .= 'entraineur';
				break;
			case 'TITULAIRE':
				$stringQuery .= 'titulaire';
				break;
			case 'EQUIPE':
				$stringQuery .= 'equipe';
				break;
			default:
				die('Pas une table valide');
				break;
		}

		return $stringQuery . ";";
	}

	/**************************************************************************
	fonction qui permet d'avoir le prochain identifiant de la table. Elle est là uniquement parce que nous n'avons pas d'autoincremente dans notre base de données
	 ***************************************************************************/
	public function donneProchainIdentifiant($uneTable)
	{
		$stringQuery = $this->specialCase("SELECT * FROM ", $uneTable);
		$requete = $this->conn->prepare($stringQuery);
		//$requete->bindValue(1,$unIdentifiant);

		if ($requete->execute())
		{
			$nb = 0;
			while ($row = $requete->fetch(PDO::FETCH_NUM))
			{
				$nb = $row[0];
			}
			return $nb + 1;
		}
		else
		{
			die('Erreur sur donneProchainIdentifiant : ' + $requete->errorCode());
		}
	}

	/************************************************************************
     Fonction qui me permettent d'obtenir le numéro max pour l'entraineur car comme nous avons un héritage, nous ne pouvons pas savoir le dernier numéro grace à conteneurVacataire ou conteneurTitulaire et normalement on a supprimé le conteneuEntraineur.
	 On aurait pu optimisé en ayant qu'une méthode et en faisant passer le nom de la table...
	 *************************************************************************/
	public function donneNumeroMaxEntraineur()
	{
		$stringQuery = "SELECT idEntraineur FROM entraineur";
		$requete = $this->conn->prepare($stringQuery);

		if ($requete->execute())
		{
			$nb = 0;
			while ($row = $requete->fetch(PDO::FETCH_NUM))
			{
				$nb + 1;
			}
			return $nb + 1;
		}
		else
		{
			die('Erreur sur l identifiant de l entraineur : ' + $requete->errorCode());
		}
	}

	public function donneNumeroMaxSpecialite()
	{
		$stringQuery = "SELECT * FROM specialite";
		$requete = $this->conn->prepare($stringQuery);
		if ($requete->execute())
		{
			$nb = 0;
			while ($row = $requete->fetch(PDO::FETCH_NUM))
			{
				$nb + 1;
			}
			return $nb + 1;
		}
		else
		{
			die('Erreur sur l identifiant de l specialite : ' + $requete->errorCode());
		}
	}

	public function donneNumeroMaxAdherent()
	{
		$stringQuery = "SELECT * FROM adherent";
		$requete = $this->conn->prepare($stringQuery);
		if ($requete->execute())
		{
			$nb = 0;
			while ($row = $requete->fetch(PDO::FETCH_NUM))
			{
				$nb + 1;
			}
			return $nb + 1;
		}
		else
		{
			die('Erreur sur l identifiant de l adherent : ' + $requete->errorCode());
		}
	}
}

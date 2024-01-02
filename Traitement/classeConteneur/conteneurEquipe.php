<?php


class conteneurEquipe
{
	//attribut de type arrayObjet, mais on est en php donc on ne met pas les types
	private $lesEquipes;

	//le constructeur créer un tableau vide
	public function __construct()
	{
		$this->lesEquipes = new arrayObject();
	}

	//les méthodes habituellement indispensables
	public function ajouterUneEquipe(int $unIdEquipe, string $unNomEquipe, int $unNbrPlaceEquipe, int $unAgeMinEquipe, int $unAgeMaxEquipe, string $unSexeEquipe, metierSpecialite $uneSpecialite, metierEntraineur $unEntraineur)
	{

		$uneEquipe = new metierEquipe(lEntraineur: $unEntraineur, laSpecialite: $uneSpecialite,  idEquipe: $unIdEquipe, nomEquipe: $unNomEquipe,  nbrPlaceEquipe: $unNbrPlaceEquipe, ageMinEquipe: $unAgeMinEquipe, ageMaxEquipe: $unAgeMaxEquipe, sexeEquipe: $unSexeEquipe);
		$this->lesEquipes->append($uneEquipe);
	}


	public function modifierUneEquipe($unIdEquipe, $unNomEquipe,  $unNbrPlaceEquipe, $unAgeMinEquipe, $unAgeMaxEquipe, $unSexeEquipe, $uneSpecialite, $unEntraineur)
	{

		foreach ($this->lesEquipes as $uneEquipe)
		{
			if ($uneEquipe->idEquipe == $unIdEquipe)
			{
				$uneEquipe->nomEquipe = $unNomEquipe;
				$uneEquipe->nbrPlaceEquipe = $unNbrPlaceEquipe;
				$uneEquipe->ageMinEquipe = $unAgeMinEquipe;
				$uneEquipe->ageMaxEquipe = $unAgeMaxEquipe;
				$uneEquipe->sexeEquipe = $unSexeEquipe;
				$uneEquipe->idSpecialite = $uneSpecialite->idSpecialite;
				$uneEquipe->nomSpecialite = $uneSpecialite->nomSpecialite;
				$uneEquipe->idEntraineur = $unEntraineur->idEntraineur;
				$uneEquipe->nomEntraineur = $unEntraineur->nomEntraineur;
			}
		}
	}



	public function nbEquipe()
	{
		return $this->lesEquipes->count();
	}

	public function listeDesEquipes()
	{
		$liste = '';
		foreach ($this->lesEquipes as $uneEquipe)
		{
			$liste = $liste . $uneEquipe->afficheEquipe();
		}
		return $liste;
	}

	public function lesEquipesAuFormatHTML()
	{
		$liste = "<SELECT name = 'idEquipe'>";
		foreach ($this->lesEquipes as $uneEquipe)
		{
			$liste = $liste . "<OPTION value='" . $uneEquipe->idEquipe . "'>" . $uneEquipe->nomEquipe . "</OPTION>";
		}
		$liste = $liste . "</SELECT>";
		return $liste;
	}

	public function leNomDesEquipes()
	{
		$return = array();

		foreach ($this->lesEquipes as $uneEquipe)
		{
		array_push($return, $uneEquipe->nomEquipe /*. ' (' . $uneEquipe->nomEntraineur . ')'*/);
		}

		return implode(', ', $return);
	}

	public function specialiteDesEquipes()
	{
		$return = array();

		foreach ($this->lesEquipes as $uneEquipe)
		{
		array_push($return, $uneEquipe->nomSpecialite /*. ' (' . $uneEquipe->nomEntraineur . ')'*/);
		}

		return implode(', ', $return);
	}

	public function donneObjetEquipeDepuisNumero($unIdEquipe)
	{

		$trouve = false;
		$laBonneEquipe = null;
		foreach ($this->lesEquipes as $uneEquipe)
		{
			if ($uneEquipe->idEquipe == $unIdEquipe)
			{
				$trouve = true;
				$laBonneEquipe = $uneEquipe;
			}
		}
		return $laBonneEquipe;
	}
}

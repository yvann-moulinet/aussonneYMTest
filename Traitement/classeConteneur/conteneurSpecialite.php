<?php


class conteneurSpecialite
	{
	//attribut de type arrayObjet, mais on est en php donc on ne met pas les types
	private $lesSpecialites;
	
	//le constructeur créer un tableau vide
	public function __construct()
		{
		$this->lesSpecialites = new arrayObject();
		}
	
	//les méthodes habituellement indispensables
	public function ajouterUneSpecialite(int $unIdSpecialite, string $unNomSpecialite, int $unNbrPlaceEquipe, int $unAgeMinEquipe, int $unAgeMaxEquipe, string $unSexeEquipe,metierEntraineur $unEntraineur)
	{
		$uneSpecialite = new metierSpecialite( idSpecialite : $unIdSpecialite, nomSpecialite : $unNomSpecialite, nbrPlaceEquipe : $unNbrPlaceEquipe, ageMinEquipe : $unAgeMinEquipe, ageMaxEquipe : $unAgeMaxEquipe, sexeEquipe : $unSexeEquipe,lEntraineur : $unEntraineur);
		$this->lesSpecialites->append($uneSpecialite);
			
	}
	
	public function modifierUneSpecialite($unIdSpecialite, $unNomSpecialite, $unNbrPlaceEquipe, $unAgeMinEquipe, $unAgeMaxEquipe, $unSexeEquipe, $unEntraineur)
	{
			
		foreach ($this->lesSpecialites as $uneSpecialite)
		{
			if ($uneSpecialite->idSpecialite == $unIdSpecialite)
			{
				$uneSpecialite->nomSpecialite = $unNomSpecialite;
				$uneSpecialite->nbrPlaceEquipe = $unNbrPlaceEquipe;
				$uneSpecialite->ageMinEquipe = $unAgeMinEquipe;
				$uneSpecialite->ageMaxEquipe = $unAgeMaxEquipe;
				$uneSpecialite->sexeEquipe = $unSexeEquipe;
				$uneSpecialite->idEntraineur = $unEntraineur->idEntraineur;
				$uneSpecialite->nomEntraineur = $unEntraineur->nomEntraineur;
			}
		}
	}

	
	
	public function nbSpecialite()
		{
		return $this->lesSpecialites->count();
		}	
		
	public function listeDesSpecialites()
		{
		$liste = '';
		foreach ($this->lesSpecialites as $uneSpecialite)
			{	$liste = $liste.$uneSpecialite->afficheSpecialite();
			}
		return $liste;
		}
		
	public function lesSpecialitesAuFormatHTML()
		{
		$liste = "<SELECT name = 'idSpecialite'>";
		foreach ($this->lesSpecialites as $uneSpecialite)
			{
			$liste = $liste."<OPTION value='".$uneSpecialite->idSpecialite."'>".$uneSpecialite->nomSpecialite."</OPTION>";
			}
		$liste = $liste."</SELECT>";
		return $liste;
		}		
	
	public function donneObjetSpecialiteDepuisNumero($unIdSpecialite)
		{
		
		$trouve=false;
		$laBonneSpecialite=null;
		foreach ($this->lesSpecialites as $uneSpecialite)
			{
				if ($uneSpecialite->idSpecialite==$unIdSpecialite)
				{
				$trouve=true;
				$laBonneSpecialite = $uneSpecialite;
				}
			}
		return $laBonneSpecialite;
		}	
			
	}
?> 
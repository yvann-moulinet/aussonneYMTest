<?php

class vueCentraleAdherent
{
	public function __construct()
	{
	}

	public function visualiserAdherent($message)
	{
		$listeAdherent = explode('\n', $message);
		echo '<table class="table table-striped table-bordered table-sm ">
					<thead>
						<tr>
							<th scope="col">Nom</th>
							<th scope="col">Prenom</th>
							<th scope="col">Age</th>
							<th scope="col">Sexe</th>
							<th scope="col">Login</th>
							<th scope="col">Equipe</th>
							<th scope="col">Specialité</th>
						</tr>
					</thead>
					<tbody>';
		/*$nbE = 0;
		while ($nbE < sizeof($listeAdherent))
		{
			/*$i = 0;
			while (($i < 7) && ($nbE < sizeof($listeAdherent)))
			{
				echo '<td>';
				echo trim($listeAdherent[$nbE]);
				$i++;
				$nbE++;
				echo '</td>';
			}
			echo '</tr>';
		}*/
		foreach (array_filter($listeAdherent) as $adherent)
		{
			echo '<tr><td>';
			echo str_replace('|', "</td><td>", $adherent);
			echo '</td></tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}

	public function voyagerAdherent()
	{
		echo '<iframe width=100% height=150% src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2885.319959224129!2d1.3158100143582203!3d43.683111158516006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aeaee6224c0f13%3A0x9f57b169fe3a7161!2sMairie!5e0!3m2!1sfr!2sfr!4v1626195896682!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
	}

	public function modifierSonProfilAdherent()
	{	//form pour passer la variable npass
		echo '<form action="" method="POST">
		<label>Changer le mot de passe</label>
		<input type="password" id="npass" name="npass" required"><br>
		<input type="submit" value="Envoyer">
		</form>';
	}

	public function informationAdherent($id, $coequipier)
	{
		$listeAdherent = explode("|", $id);
		$listeAdherent[6] = str_replace('\n', '', $listeAdherent[6]);
		//print_r($listeAdherent);
		echo '<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm">
					<div class="card col d-flex" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">Visualisation d\'un utilisateur</h5>
								<h6 class="card-subtitle mb-2 text-muted">Detail de l\'utilisateur</h6>
									<p class="card-text">' . $listeAdherent[0] . ' ' . $listeAdherent[1] . '<br> 
									Age : ' . $listeAdherent[2] . '<br> 
									Sexe : ' . $listeAdherent[3] . '<br> 
									Login : ' . $listeAdherent[4] . '<br> 
									Specialite : ' . $listeAdherent[6] . '<br>
									</p>
						</div>
					</div>
				</div>
				<div class="col-sm">
				</div>
			</div>';

		$equipesAdherents = array();

		// Remplir le tableau associatif avec les adhérents et les équipes
		foreach ($coequipier as $adherent)
		{
			$nomAdherent = $adherent[0];
			$nomEquipe = $adherent[1];

			// Vérifier si l'équipe existe déjà dans le tableau
			if (!isset($equipesAdherents[$nomEquipe]))
			{
				$equipesAdherents[$nomEquipe] = array();
			}

			// Ajouter l'adhérent à l'équipe respective
			$equipesAdherents[$nomEquipe][] = $nomAdherent;
		}

		echo '<div class="pl-3 pt-3">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">Equipe</th>
                    <th scope="col">Coéquipiers</th>
                </tr>
            </thead>
            <tbody>';

		foreach ($equipesAdherents as $nomEquipe => $adherents)
		{
			echo '<tr>
                <td>
                    ' . $nomEquipe . '
                </td>
                <td>
                    ' . implode(", ", $adherents) . '
                </td>
            </tr>';
		}

		echo '</tbody>';
		echo '</table>';
		echo '</div>';
	}

	public function saisirAdherents($listeEquipe)
	{

		echo '<form action=index.php?vue=Adherent&action=enregistrer method=POST>';
		echo '<legend>Information de l\'adherent</legend>
							
			<table class="table table-bordered table-sm table-striped">
				<thead>
					<tr>
						<th scope="col">nom adherent</th>
						<th scope="col">prénom adherent</th>
						<th scope="col">Age</th>
						<th scope="col">Sexe</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td scope>
							<input type="text" name="nom" id="nom" required=true>
						</td>
						<td>
							<input type=text name=prenom id=prenom required=true>
						</td>
						<td>
							<input type=text name=age id=age required=true>
						</td>
						<td>
							<select id="sexe" name="sexe">
							<option value="Féminin">Féminin</option>
							<option value="Masculin">Masculin</option>
							</select>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="table table-bordered table-sm table-striped">
			<thead>
				<tr>
					<th scope="col">Login</th>
					<th scope="col">Mot de passe</th>
					<th scope="col">Equipes</th>

				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
					<input type="text" name="login" id="login" required=true>
					</td>
					<td>
					<input type="text" name="pwd" id="pwd" required=true>
					</td>
					<td>';
		echo $listeEquipe . '
					</td>
				</tr>
			</tbody>
		</table>
		<p class="text-danger font-weight-bold">M\'intenir la touche Ctrl appuiyer pour sélectionner plusieurs equipes</p>
		<div class="text-center">
		<button type="submit" class="btn btn-primary">Valider</button>
		</div>
			
	</form>';
	}

	public function modifierAdherent($listeAdherent)
	{
		{
			echo '<form action=index.php?vue=Adherent&action=saisirModif method=POST>
				  <legend class="text-center">Choisir L \'adherent à modifier : ' . $listeAdherent . ' </legend>';
			echo '<div class="text-center">
			   <button type="submit" class="btn btn-primary text-center">Valider</button>
			   </div>
			   </form>';
		}
	}

	public function saisirModifAdherent($idAdherent, $nomAdherent, $prenomAdherent, $age, $login, $pwd, $listeEquipe)
	{

		echo '<form action=index.php?vue=Equipe&action=enregistrerModification method=POST>';

		echo '<div class="container pt-5">
	  	<p class="h2 text-center pb-3">Modifier adherent<p>
			<div class="row justify-content-center">
				<div class="col-6">
					<table class="table text-center">
					<tr>
						<td>Nom adherent :</td>
						<td><input type="text" name="nomAdherent" id="nomAdherent" value="' . $nomAdherent . '" required="true"></td>
					</tr>
					<tr>
						<td>prenom adherent:</td>
						<td><input type="text" name="prenomAdherent" id="prenomAdherent" value="' . $prenomAdherent . '" required="true"></td>
					</tr>
					<tr>
						<td>Age :</td>
						<td><input type="text" name="age" id="age" value="' . $age . '" required="true"></td>
					</tr>
					<tr>
						<td>Sexe :</td>
						<td>              
						<select id="sexEquipe" name="sexEquipe" required>
							<option value="Féminin">Féminin</option>
							<option value="Masculin">Masculin</option>
						</select>
						</td>
					</tr>
					<tr>
						<td>Login :</td>
						<td><input type="text" name="login" id="login" value="' . $login . '" required="true"></td>
					</tr>
					<tr>
						<td>Mot de passe :</td>
						<td><input type="text" name="pwd" id="pwd" value="' . $pwd . '" required="true"></td>
					</tr>
					<tr>
						<td>Equipe :</td>
						<td> ' . $listeEquipe . '</td>
					</tr>
					</table>
				</div>
			</div>
	  </div>
	  <div class="text-center">			
		<button type="submit" class="btn btn-primary">Valider</button>
	  </div>
  
	  <input type="hidden" name="idAdherent" value="' . $idAdherent . '">
  
	  </form>';
	}

	public function messageRequeteInsert()
	{
		echo '<div class="text-center h2 pt-4">
	  
			Le l\ajout de l\'adherent est prit en compte.
	  
		</div>';
	}

	public function messageRequeteTrigger()
	{
		echo '<div class="text-center h2 pt-4">
	  
			l\'dherent ne corespond pas aux critéres de l\'équipe.
	  
		</div>';
	}
}

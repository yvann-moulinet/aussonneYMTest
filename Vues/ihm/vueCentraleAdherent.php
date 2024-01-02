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
}

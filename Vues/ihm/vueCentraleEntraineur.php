	<?php

	class vueCentraleEntraineur
	{
		public function __construct()
		{
		}

		public function ajouterEntraineur()
		{
			echo '<form action=index.php?vue=Entraineur&action=SaisirEntraineur method=POST align=center>
							<fieldset>
							<legend>L entraineur est un : </legend>
							<input type="radio" name="typeEntraineur" value="Vacataire" id="vacataire">
							<label for="vacataire">Vacataire</label> <br/>

							<input type="radio" name="typeEntraineur" value="Titulaire" id="titulaire">
							<label for="titulaire">Titulaire</label> <br/>

							
							
							<button type="submit" class="btn btn-primary">Valider</button>
							</fieldset>	
						  </form>';
		}
		public function visualiserEntraineur($liste)
		{
			$listeEntraineur = explode('\n', $liste);

			echo '<table class="table table-striped table-bordered table-sm ">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Nom</th>
							<th scope="col">Login</th>
							<th scope="col">Spécialité</th>
							<th scope="col">Date ou Téléphone</th>
						</tr>
					</thead>
					<tbody>';
			/*$nbE = 0;
			while ($nbE < sizeof($listeEntraineur)) {
				$i = 0;
				echo '<tr>';
				while (($i < 5) && ($nbE < sizeof($listeEntraineur))) {
					echo '<td scope>';
					echo trim($listeEntraineur[$nbE]);
					$i++;
					$nbE++;
					echo '</td>';
				}
				echo '</tr>';
			}*/
			foreach (array_filter($listeEntraineur) as $entraineur)
			{
				echo '<tr><td>';
				echo str_replace('|', "</td><td>", $entraineur);
				echo '</td></tr>';
			}

			echo '</tbody>';
			echo '</table>';
		}
		public function saisirEntraineur($listeSpecialite)
		{
			$typeEntraineur = $_POST['typeEntraineur'];

			echo '<form action=index.php?vue=Entraineur&action=enregistrer method=POST>';

			switch ($typeEntraineur) {
				case 'Vacataire':
					echo '<legend>Information du Vacataire</legend>
							
							<table class="table table-bordered table-sm table-striped">
								<thead>
									<tr>
									  <th scope="col">Téléphone</th>
									  <th scope="col">Nom</th>
									  <th scope="col">Login</th>
									  <th scope="col">Password</th>
									  <th scope="col">Spécialité</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									  <td scope>
										<input type="text" name="numTelVacataire" id="NumTel" required="true">
									  </td>
									  <td>
										<input type=text name=nomEntraineur id=nomEntraineur required=true>
									  </td>
									  <td>
										<input type=text name=loginEntraineur id=loginEntraineur required=true>
									  </td>
									  <td>
										<input type=text name=pwdEntraineur id=pwdEntraineur required=true>
									  </td>
									  <td>';
										echo $listeSpecialite;
										echo '</td>
									</tr>
									<tr colspan=5>
									  <input type=hidden name=typeEntraineur value=' . $typeEntraineur . '>
									  <button type="submit" class="btn btn-primary">Valider</button>
									</tr>
								</tbody>
							</table>
							
					</form>';
					break;

				case 'Titulaire':
					echo '<legend>Information du Titulaire</legend>
												
							<table class="table table-bordered table-sm table-striped">
								<thead>
									<tr>
									  <th scope="col">Date Entrée</th>
									  <th scope="col">Nom</th>
									  <th scope="col">Login</th>
									  <th scope="col">Password</th>
									  <th scope="col">Spécialité</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									  <td scope>
									    <input type=date name="dateEmbaucheTitulaire" placeholder="YYYY-MM-DD" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" id="dateEmbaucheTitulaire" required="true">
									  </td>
									  <td>
										<input type=text name=nomEntraineur id=nomEntraineur required=true>
									  </td>
									  <td>
										<input type=text name=loginEntraineur id=loginEntraineur required=true>
									  </td>
									  <td>
										<input type=text name=pwdEntraineur id=pwdEntraineur required=true>
									  </td>
									  <td>';
										echo $listeSpecialite;
										echo '</td>
									</tr>
									<tr colspan=5>
									  <input type=hidden name=typeEntraineur value=' . $typeEntraineur . '>
									  <button type="submit" class="btn btn-primary">Valider</button>
									</tr>
								</tbody>
							</table>
							
					</form>';
					break;
			}
		}
	}

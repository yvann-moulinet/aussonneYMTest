<?php
	
	class vueCentraleSpecialite
	{
		public function __construct()
		{
			
		}
		
		public function modifierSpecialite($message)
		{
			echo '<form action=index.php?vue=Specialite&action=choixFaitPourModif method = GET>';
			echo $message; 
			echo ' <input type=hidden name=vue value=Specialite></input>
				   <input type=hidden name=action value=choixFaitPourModif></input>
				   <button type="submit" class="btn btn-primary">Valider</button>
				  </form>
			';
		}
		public function visualiserSpecialite($message)
		{
						
			$listeSpecialite=explode('\n',$message);
			echo '<table class="table table-striped table-bordered table-sm ">
					<thead>
						<tr>
							<th scope="col">Nom</th>
														
						</tr>
					</thead>
					<tbody>';
			/*$nbE=0;
			while ($nbE<sizeof($listeSpecialite))
			{	
				$i=0;
				while (($i<6) && ($nbE<sizeof($listeSpecialite)))
				{
					echo '<td scope>';
					echo trim($listeSpecialite[$nbE]);
					$i++;
					$nbE++;
					echo '</td>';
				}
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';*/
			foreach (array_filter($listeSpecialite) as $specialite)
			{
				echo '<tr><td>';
				echo str_replace('|', "</td><td>", $specialite);
				echo '</td></tr>';
			}
			echo '</tbody>';
			echo '</table>';
			
		}
		
		
	public function choixFaitPourModifSpecialite($nom, $nbrPlace, $ageMin, $ageMax, $sexe, $choix,$liste)
	{
		echo 'coucou';
		echo '<form action=index.php?vue=Specialite&action=EnregModif method = GET>
						<input type=text name=nomSpecialite value='.$nom.'></input>
						<input type=integer name=nbrPlaceEquipe value='.$nbrPlace.'></input>
						<input type=integer name=ageMinEquipe value='.$ageMin.'></input>
						<input type=integer name=ageMaxEquipe value='.$ageMax.'></input>
						<input type=text name=sexeEquipe value='.$sexe.'></input>	';
						echo $liste;
						echo '<input type=hidden name=idSpecialite value='.$choix.'></input>	
						<input type=hidden name=vue value=Specialite></input>
						<input type=hidden name=action value=EnregModif></input>
						<button type="submit" class="btn btn-primary">Valider</button>
			 </form>';
	}
}

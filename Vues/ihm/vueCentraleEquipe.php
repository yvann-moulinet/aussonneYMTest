<?php

class vueCentraleEquipe
{
    public function __construct()
    {
    }

    public function modifierEquipe($message)
    {
        echo '<form action=index.php?vue=Equipe&action=choixFaitPourModif method = GET>';
        echo $message;
        echo ' <input type=hidden name=vue value=Equipe></input>
				   <input type=hidden name=action value=choixFaitPourModif></input>
				   <button type="submit" class="btn btn-primary">Valider</button>
				  </form>
			';
    }
    public function visualiserEquipe($message)
    {

        $listeEquipe = explode('\n', $message);
        echo '<table class="table table-striped table-bordered table-sm ">
					<thead>
						<tr>
							<th scope="col">Nom</th>
                            <th scope="col">Age Min</th>
							<th scope="col">Age Max</th>
							<th scope="col">Sexe</th>
							<th scope="col">Nbr de pers Max par équipe</th>
                            <th scope="col">Spécialité</th>
							<th scope="col">Entraineur</th>						
						</tr>
					</thead>
					<tbody>';
        foreach (array_filter($listeEquipe) as $equipe)
        {
            echo '<tr><td>';
            echo str_replace('|', "</td><td>", $equipe);
            echo '</td></tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
}

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

        $listeSpecialite = explode("|", $message);
        echo '<table class="table table-striped table-bordered table-sm ">
					<thead>
						<tr>
							<th scope="col">Nom</th>
							<th scope="col">Age Min</th>
							<th scope="col">Age Max</th>
							<th scope="col">Sexe</th>
							<th scope="col">Nbr de pers Max</th>
							<th scope="col">Entraineur</th>
														
						</tr>
					</thead>
					<tbody>';
        $nbE = 0;
        while ($nbE < sizeof($listeSpecialite))
        {
            $i = 0;
            while (($i < 6) && ($nbE < sizeof($listeSpecialite)))
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
        echo '</table>';
    }
}

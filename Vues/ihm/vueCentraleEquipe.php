<?php

class vueCentraleEquipe
{
    public function __construct()
    {
    }

    public function modifierEquipe($listeEquipe)
    {
        {
            echo '<form action=index.php?vue=Entraineur&action=saisirModification method=POST>
                <legend class="text-center">Choisir L \'equipe à modifier : ' . $listeEquipe . ' </legend>';
            echo '<div class="text-center">
             <button type="submit" class="btn btn-primary text-center">Valider</button>
             </div>
             </form>';
        }
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

    public function saisirEquipe($listeSpecialite, $listeEntraineur)
    {
        echo '<form action=index.php?vue=Entraineur&action=enregistrer method=POST>';
        echo '<legend>Information de l\'équipe</legend>
                        
                        <table class="table table-bordered table-sm table-striped">
                            <thead>
                                <tr>
                                  <th scope="col">nom équipe</th>
                                  <th scope="col">nombre de place équipe</th>
                                  <th scope="col">Age minimum</th>
                                  <th scope="col">Age maximum</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td scope>
                                    <input type="text" name="nomEquipe" id="nomEquipe" required="true">
                                  </td>
                                  <td>
                                    <input type=text name=placeEquipe id=placeEquipe required=true>
                                  </td>
                                  <td>
                                    <input type=text name=ageMin id=ageMin required=true>
                                  </td>
                                  <td>
                                    <input type=text name=ageMax id=ageMax required=true>
                                  </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered table-sm table-striped">
                        <thead>
                            <tr>
                              <th scope="col">Sexe équipe</th>
                              <th scope="col">Spécialité</th>
                              <th scope="col">Entraineur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>
                              <input type=text name=sexEquipe id=sexEquipe required=true>
                              </td>
                              <td>';
    echo $listeSpecialite;
    echo '</td>
                              <td>';
    echo $listeEntraineur;
    echo '</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                        
                </form>';
    }
}

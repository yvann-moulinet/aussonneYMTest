<?php
class metierEquipe
{



    //CONSTRUCTEUR-----------------------------------------------------------------------------

    public function __construct(private metierSpecialite $lSpecialite, private int $idEquipe = 0, private string $nomEquipe = '')
    {
        $this->lSpecialite->ajoutSpecialite($this);
    }
    public function ajoutEquipe($lEquipe)
    {
        $this->idEquipe = $lEquipe->idEquipe;
        $this->nomEquipe = $lEquipe->nomEquipe;
    }
    //ACCESSEURS-------------------------------------------------------------------------------
    public function __get($attribut)
    {
        switch ($attribut)
        {
            case 'idEquipe':
                return $this->idEquipe;
                break;
            case 'nomEquipe':
                return $this->nomEquipe;
                break;
            case 'idSpecialite':
                return $this->lSpecialite->idSpecialite;
                break;
            case 'nomSpecialite':
                return $this->lSpecialite->nomSpecialite;
                break;
            case 'nomEntraineur':
                return $this->lSpecialite->nomEntraineur;
                break;
            default:
                $trace = debug_backtrace();
                trigger_error('Propriété non-accessible via _get() :' . $attribut . 'dans ' . $trace[0]['file'] . ' à la ligne' . $trace[0]['line'], E_USER_NOTICE);
                break;
        }
    }

    //SETTEUR------------------------------------------------------------

    public function __set($attribut, $laValeurDeLAttribut)
    {
        switch ($attribut)
        {
            case 'idEquipe':
                $this->idEquipe = $laValeurDeLAttribut;
                break;
            case 'nomEquipe':
                $this->nomEquipe = $laValeurDeLAttribut;
                break;
            case 'idSpecialite':
                $this->idSpecialite = $laValeurDeLAttribut;
                break;
            case 'nomSpecialite':
                $this->nomSpecialite = $laValeurDeLAttribut;
                break;
            default:
                $trace = debug_backtrace();
                trigger_error('Propriété non-accessible via _get() :' . $attribut . 'dans ' . $trace[0]['file'] . ' à la ligne' . $trace[0]['line'], E_USER_NOTICE);
                break;
        }
    }

    // méthode permettant d'afficher tous les attributs d'un seul coup
    public function afficheEquipe()
    {
        return $this->nomEquipe . '|' . $this->nomSpecialite . '|' . $this->nomEntraineur . '\n';
    }
}

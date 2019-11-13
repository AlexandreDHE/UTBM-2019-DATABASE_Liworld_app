<?php 

namespace App\Repositories;

use App\Experiences_professionnelles;
use Illuminate\Support\Facades\DB;

class Experiences_professionnellesRepository implements Experiences_professionnellesRepositoryInterface
{

    protected $experiencesProfessionnelles;

    public function __construct(Experiences_professionnelles $experiencesProfessionnelles)
    {
        $this->experiencesProfessionnelles = $experiencesProfessionnelles;
    }

    public function save($id_user, $id_typesContrats, $id_entreprise, $nomPoste, $dateDebut, $dateFin, $description, $numeroVoie, $rue, $ville, $codePostale)
    {
        $this->experiencesProfessionnelles = new Experiences_professionnelles;
        $this->experiencesProfessionnelles->id_user = $id_user;
        $this->experiencesProfessionnelles->id_typesContrats = $id_typesContrats;
        $this->experiencesProfessionnelles->id_entreprise = $id_entreprise;
        $this->experiencesProfessionnelles->nomPoste = $nomPoste;
        $this->experiencesProfessionnelles->dateDebut = $dateDebut;
        $this->experiencesProfessionnelles->dateFin = $dateFin;
        $this->experiencesProfessionnelles->description = $description;
        $this->experiencesProfessionnelles->numeroVoie = $numeroVoie;
        $this->experiencesProfessionnelles->rue = $rue;
        $this->experiencesProfessionnelles->ville = $ville;
        $this->experiencesProfessionnelles->codePostale = $codePostale;
        $this->experiencesProfessionnelles->save();
    }

    public function getData($id_user)
    {

        $res = array(array());
        $req = DB::table('experiencesProfessionnelles')
            ->select('id_typesContrats', 'id_entreprise', 'nomPoste', 'dateDebut', 'dateFin', 'description', 'numeroVoie', 'rue', 'ville', 'codePostale')
            ->where('id_user', $id_user)
            ->get();
    
        $i = 0;
    
        foreach ($req as $value) {
            $res[$i+1][0] = $value->id_typesContrats;
            $res[$i+1][1] = $value->id_entreprise;
            $res[$i+1][2] = $value->nomPoste;
            $res[$i+1][3] = $value->dateDebut;
            $res[$i+1][4] = $value->dateFin;
            $res[$i+1][5] = $value->description;
            $res[$i+1][6] = $value->numeroVoie;
            $res[$i+1][7] = $value->rue;
            $res[$i+1][8] = $value->ville;
            $res[$i+1][9] = $value->codePostale;
            $i++;
        }

        $res[0] = $i ;
    
        return $res;
    }


}
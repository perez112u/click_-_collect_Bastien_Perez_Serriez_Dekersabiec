<?php
declare(strict_types=1);

namespace ccd\models;
use Illuminate\Database\Eloquent as Eloq;

class Produit extends Eloq\Model
{
    protected $table = 'produit';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function categorie() {
        return $this->belongsTo('ccd\models\Categorie', 'categorie');
    }

    public function getNom():string{}

    public function getPrix():string{}

    public function getLieu():string{}

    public function getImage():string{
        return "Ressources/Images/test.jpg";
    }

}
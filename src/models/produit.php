<?php
declare(strict_types=1);

namespace models;
use Illuminate\Database\Eloquent as Eloq;

class Produit extends Eloq\Model
{
    protected $table = 'produit';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function categorie() {
        return $this->belongsTo('ccd\models\Categorie', 'categorie_id');
    }


}
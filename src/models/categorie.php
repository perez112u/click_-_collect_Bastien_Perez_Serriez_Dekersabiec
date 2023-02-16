<?php
declare(strict_types=1);

namespace ccd\models;
use \Illuminate\Database\Eloquent as Eloq;

class categorie extends Eloq\Model
{
    protected $table = 'categorie';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
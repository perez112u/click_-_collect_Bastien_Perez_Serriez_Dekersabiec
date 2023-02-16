<?php

namespace ccd\Action;

use ccd\models\Produit;
use ccd\render\ProduitRenderer;
use ccd\render\Renderer;


class AffichageProduit extends Action {

    private int $idProduit;

    public function __construct(int $id)
    {
        parent::__construct();
        $this->idProduit = $id;
    }


    public function execute(): string
    {
        $p = produit::where('id','=',$this->idProduit)->first();
        $pr = new ProduitRenderer($p);
        return $pr->render(Renderer::DETAIL);


    }
}
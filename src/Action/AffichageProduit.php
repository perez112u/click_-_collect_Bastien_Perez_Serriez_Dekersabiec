<?php

namespace ccd\Action;

use ccd\render\ProduitRenderer;

public class AffichageProduit extends Action {


    private int $idProduit;

    public function __construct($id)
    {
        $this->idProduit = $id;

    }

    public function execute(): string
    {
        $pr = new ProduitRenderer($this->idProduit);
        return $pr->render(1);
    }
}

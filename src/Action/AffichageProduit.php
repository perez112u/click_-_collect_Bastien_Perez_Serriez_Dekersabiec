<?php

namespace ccd\Action;

use ccd\models\Produit;
use ccd\render\ProduitRenderer;
use ccd\render\Renderer;

class AffichageProduit extends Action {



    public function execute(): string
    {
        $produits = produit::get();
        $res = "<div id='catalogue-produits'>";


        foreach ($produits as $p) {
            $renderer = new ProduitRenderer($p);
            $res .= $renderer->render(Renderer::COMPACT);
        }

        $res .= "</div>";
        return $res;

    }
}

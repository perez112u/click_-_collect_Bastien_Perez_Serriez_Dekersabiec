<?php

namespace ccd\Action;


use ccd\classes\Catalogue;
use ccd\models\Produit;
use ccd\render\ProduitRenderer;
use ccd\render\Renderer;
use Illuminate\Support\Collection;

class AffichageCatalogue extends Action
{

    protected int $numCat;


    public function __construct(int $num)
    {
        parent::__construct();
        $this->numCat = $num;

    }

    public function execute(): string
    {
        $cat = Catalogue::getCatalogue();

        if ($cat == null) {
            $produits = produit::skip(($this->numCat-1)*5-1)->take(5)->get();
        } else {
            $produits =  $cat->skip(($this->numCat-1)*5-1)->take(5)->get();

        }

        $res = "<div id='catalogue-produits'>";

        /**
         * Affiche tout les produits
         */
        foreach ($produits as $p) {
            $renderer = new ProduitRenderer($p);
            $res .= $renderer->render(Renderer::COMPACT);
        }

        $res .= "</div>";
        return $res;

    }

}
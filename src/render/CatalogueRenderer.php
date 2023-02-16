<?php

namespace ccd\render;

use ccd\models\Produit;
use Illuminate\Database\Eloquent\Model;

class CatalogueRenderer implements Renderer
{

    private array $produits;

    public function __construct() {
        $this->produits = [];
    }

    public static function recupererBoutonHtml()
    {
        $produits = produit::get();
        $html = "";
        $nb = ceil(count($produits)/5);

        for ($i = 1; $i<=$nb; $i++) {
            $html .= '<button type="submit" name="c"' . $i . '">Page ' . $i . '</button>';
        }
        return $html;
    }

    public function ajouterCatalogue(Model $p): void
    {
        if (count($this->produits) < 5) {
            array_push($this->produits,$p);
        }
    }


    public function render(int $selector): string
    {
        $html = '<div id="catalogue">';

        foreach ($this->produits as $p) {
            $renderer = new ProduitRenderer($p);
            $html .= $renderer->render(1);
        }

        $html .= '</div>';

        return $html;
    }


}
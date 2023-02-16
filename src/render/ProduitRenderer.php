<?php

namespace ccd\render;

use ccd\models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

/**
 * Classe gérant l'affichage d'un produit
 */
class ProduitRenderer implements Renderer
{
    /**
     * @var Produit $produit
     */
    private Model $produit;

    /**
     * @param Produit $produit
     */
    public function __construct(Model $produit)
    {
        $this->produit = $produit;
    }

    /**
     * Gère l'affiche d'un produit dans le catalogue
     * @return string
     */
    private function renderCompact(): string
    {
       // TODO: A completer
        return '<br><button id="buttonProd" type="submit" name="idProduit" value=" '. $this->produit->id . '">
            <h2>' . $this->produit->prix . '</h2>
            <h3>' . $this->produit->lieu . '</h3>
            <img src="Ressources/Images/test.jpg" alt="test">
        </button>';
    }

    /**
     * Gère l'affichage du détail d'un produit
     * @return string
     */
    private function renderDetail(): string
    {
        // TODO: A completer
    }

    /**
     * Gère la gestion de l'affichage d'un produit
     * @param int $selector
     * @return string
     */
    public function render(int $selector): string
    {
        $html = "";
        switch ($selector) {
            case Renderer::COMPACT:
                $html = $this->renderCompact();
                break;
            case Renderer::DETAIL:
                $html = $this->renderDetail();
                break;
        }
        return $html;
    }
}
<?php

namespace ccd\render;

use ccd\models\Produit;
use Illuminate\Support\Str;

/**
 * Classe gérant l'affichage d'un produit
 */
class ProduitRenderer implements Renderer
{
    /**
     * @var Produit $produit
     */
    private Produit $produit;

    /**
     * @param Produit $produit
     */
    public function __construct(Produit $produit)
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
        // TODO: Implement render() method.
    }
}
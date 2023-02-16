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
    private function Poidscar(): string
    {
        if ($this->produit->poids == 0) {
            return "€ /kg";
        } else {
            return "€ (Prix unitaire)";
        }
    }
    private function renderCompact(): string
    {
        return '<br><button id="buttonProd" type="submit" name="idProduit" value=" '. $this->produit->id . '">
            <img src="Ressources/Images/' . $this->produit->id . '.jpg" alt="test">
            <div>
            <h1>' . $this->produit->nom . '</h1>
            <h2>' . $this->produit->prix . ' ' . $this->Poidscar() .'</h2>
            <h3>Lieu de production : ' . $this->produit->lieu . '</h3>
            <div>
            
        </button>';
    }

    /**
     * Gère l'affichage du détail d'un produit
     * @return string
     */
    private function renderDetail(): string
    {
        // TODO: A completer
        $ressources = "Ressources/Images/" . $this->produit->id . ".jpg";
        return "<div class='produit'>
                        <img src='{$ressources}' alt='imageProd'>
                        <h1>Nom : {$this->produit->nom}</h1>
                        <h2>Categorie : {$this->produit->categorie}</h2>
                        <h3>Prix : {$this->produit->prix}</h3>
                        <h3>Poids : {$this->produit->poids}</h3>
                        <p>Description: {$this->produit->description}</p>
                        <p>detail : {$this->produit->detail}</p>
                        <h4>Lieu : {$this->produit->lieu}</h4>
               </div>";
        //Ajouter la localisaton
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
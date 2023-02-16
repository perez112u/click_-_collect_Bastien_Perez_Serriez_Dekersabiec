<?php

namespace ccd\classes;

use ccd\Dispatcher\DispatcherProduit;
use ccd\models\Categorie;
use ccd\models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Catalogue
{


    private static  $produits = null;



    public static function nbCatalogue() {
        $produits = produit::get();
        return ceil(count($produits)/5);


    }

    public static function recupererBoutonHtml()
    {
        $html = "";
        $nb = Catalogue::nbCatalogue();
        for ($i = 1; $i<=$nb; $i++) {
            $html .= '<button type="submit" name="catalogue" value="' . $i . '">Page ' . $i . '</button>';
        }
        return $html;
    }

    public static function getCatalogue() {

        return Catalogue::$produits;
    }

    public static function setCatalogueDefault() {
        Catalogue::$produits = null;
    }

    public static function setLieu(string $lieu)
    {
        Catalogue::$produits = produit::where("lieu","like","%".$lieu."%");
    }

    public static function setCategorie(string $cat)
    {
        $categorie = categorie::where("nom","like",$cat)->first();
        Catalogue::$produits = $categorie->produits();

    }


}
<?php

namespace ccd\Dispatcher;

use ccd\Action\AffichageCatalogue;
use ccd\Action\AffichageCatalogueLieu;
use ccd\Action\AffichageProduit;
use ccd\classes\Catalogue;

class DispatcherProduit {

    protected ?string $action = null;


    public function __construct() {
        $this->action = $_GET['action'] ?? null;
    }

    public function run (): void {

        $html = "";

        if (isset($_GET['action'])) {

            switch ($this->action) {
                case 'afficher-produit':
                    if (isset($_POST['idProduit'])) {
                        $act = new AffichageProduit($_POST['idProduit']);
                        $html = $act->execute();
                    }
                    break;

                case 'afficher-catalogue':
                    if (isset($_POST["catalogue"])) {
                        $cat = $_POST["catalogue"];
                        $act = new AffichageCatalogue($cat);
                        $html = $act->execute();
                    }
                    break;
                case 'filtrer':
                    if (isset($_POST["catalogue"])) {
                        $cat = $_POST["catalogue"];
                    } else {
                        //encore page par defaut
                        $cat = 1;
                    }
                    if ($_POST['lieu'] != '') {
                        Catalogue::setLieu($_POST['lieu']);
                        $act = new AffichageCatalogue($cat);
                        $html = $act->execute();
                    }

                    if ($_POST['categorie'] != '') {
                        Catalogue::setCategorie($_POST['categorie']);
                        $act = new AffichageCatalogue($cat);
                        $html = $act->execute();
                    }
                    break;

            }
        } else {
            $act = new AffichageCatalogue(1);
            $html = $act->execute();
        }

        $this->renderPage($html);

    }


    public function renderPage(string $html): void {
        $cat = Catalogue::recupererBoutonHtml();

        echo <<<END
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <title>Click & Collect</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link rel="stylesheet" href='css/style.css'>
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
                <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="onclick=""  crossorigin=""></script>
                <script src="js/map.js"></script>
            </head>
            <body>
                <header id="header">
                <h1>Court-Circuit</h1>
                    
                    <nav id="nav">
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="index.php?action=afficher-produit">Produits</a></li>
                            <li><a href="index.php?action=afficher-categorie">Catégories</a></li>
                            <li><a href="index.php?action=afficher-commande">Commandes</a></li>
                            <li><a href="index"></a></li>
                        </ul>     
                    </nav>   
                    <div id="filtres">
                        <form class="form" method="post" action="?action=filtrer">
                        <label>Lieu :</label>
                        <input class="input-filtre" type="text" name="lieu">
                        <label>Categorie :</label>
                        <input class="input-filtre" type="text" name="categorie">
                        <button type="submit">Rechercher</button>
                        </form>
                    </div>
                    <div id="pages">
                            <form class="form" method="post" action="?action=afficher-catalogue">
                            $cat
                            </form>
                    </div>              
                </header>
                <h2>Produits Click & Collect</h2>          
                <main id="main">
                   $html
                </main>
            </body>
            </html> 
        END;

    }
}





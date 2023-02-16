<?php

namespace ccd\Dispatcher;

use ccd\Action\AffichageProduit;
use ccd\render\CatalogueRenderer;


class DispatcherProduit {

    protected ?string $action = null;


    public function __construct() {
        $this->action = $GET['action'] ?? null;
    }

    public function run (): void {

        switch ($this->action) {
            case 'afficher-produit':
                break;

            case 'afficher-catalogue':
                echo 'caca';
                if (isset($_POST["c1"])) {
                    echo "BLIBLIBLIBLIBLIBLIBLI";
                }
                break;
            default:
                $act = new AffichageProduit();
                $html = $act->execute();
                break;

        }

        $this->renderPage($html);
    }


    public function renderPage(string $html): void {
        $cat = CatalogueRenderer::recupererBoutonHtml();

        echo <<<END
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <title>Click & Collect</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link rel="stylesheet" href='css/style.css'>
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
                    <div id="pages">
                        <ul>
                            <form class="form" method="post" action="?action=afficher-catalogue">
                <button id="showComment" type="submit" name="serieId" value="rgirig" title="Show comments">Show comments</button>
                            $cat
                            </form>
                        </ul>
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





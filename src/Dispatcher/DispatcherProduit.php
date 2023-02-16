<?php

namespace ccd\Dispatcher;

use ccd\Action\AffichageProduit;



class DispatcherProduit {

    protected ?string $action = null;


    public function __construct() {
        $this->action = $GET['action'] ?? null;
    }

    public function run (): void {

        switch ($this->action) {
            case 'afficher-produit':
                break;
            default:
                $act = new AffichageProduit();
                $html = $act->execute();
                break;

        }

        $this->renderPage($html);
    }


    public function renderPage(string $html): void {
        echo <<<END
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <title>Click & Collect</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link rel="stylesheet" href="css/style.css">
            </head>
            <body>
                <header id="header">
                    <nav id="nav">     
                    </nav>                 
                </header>          
                <main id="main">
                    $html
                </main>
            </body>
            </html> 
        END;

    }
}





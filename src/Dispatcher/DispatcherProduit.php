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
                $act = new AffichageProduit($_POST['idProduit']);
                $html = $act->execute();
                break;
            default:
                $html = "<p>Erreur action</p>";

        }

        $this->renderPage($html);
    }


    public function renderPage(string $html): void {
        echo <<<END 
        
       //code html
       
        END;

    }
}





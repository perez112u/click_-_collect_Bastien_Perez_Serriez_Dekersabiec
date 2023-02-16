<?php

namespace ccd\filtre;

interface tri
{
    const FILTRE_BASE = 0;
    const FILTRE_LIEU = 1;
    const FILTRE_CATEGORIE = 2;

    public function filtrer(array $produits): array;
}
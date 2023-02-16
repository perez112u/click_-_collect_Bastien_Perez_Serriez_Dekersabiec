<?php

namespace ccd\filtre;

class TriBase implements tri
{

    public function filtrer(array $produits): array
    {
        return $produits;
    }
}
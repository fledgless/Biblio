<?php

class LivreManager {
    private array $livres;

    public function ajouterLivre($nouveauLivre) {
        $this->livres[] = $nouveauLivre;
    }

    /**
     * Get the value of livres
     *
     * @return array
     */
    public function getLivres(): array {
        return $this->livres;
    }
}
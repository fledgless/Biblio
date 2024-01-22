<?php

class Livre {
    private int $id;
    private string $image;
    private string $titre;
    private int $nbPages;
    private int $id_user;

    public function __construct(int $id, string $image, string $titre, int $nbPages)
    {
        $this->id = $id;
        $this->image = $image;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of image
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @param string $image
     *
     * @return self
     */
    public function setImage(string $image): self {
        $this->image = $image;
        return $this;
    }

    /**
     * Get the value of titre
     *
     * @return string
     */
    public function getTitre(): string {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @param string $titre
     *
     * @return self
     */
    public function setTitre(string $titre): self {
        $this->titre = $titre;
        return $this;
    }

    /**
     * Get the value of nbPages
     *
     * @return int
     */
    public function getNbPages(): int {
        return $this->nbPages;
    }

    /**
     * Set the value of nbPages
     *
     * @param int $nbPages
     *
     * @return self
     */
    public function setNbPages(int $nbPages): self {
        $this->nbPages = $nbPages;
        return $this;
    }

    /**
     * Get the value of id_user
     *
     * @return int
     */
    public function getIdUser(): int {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @param int $id_user
     *
     * @return self
     */
    public function setIdUser(int $id_user): self {
        $this->id_user = $id_user;
        return $this;
    }
}
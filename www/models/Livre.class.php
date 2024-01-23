<?php

class Livre {
    private int $id_livre;
    private string $image;
    private string $titre;
    private int $nbPages;
    private int $id_user;
    private string $uploader;

    public function __construct(int $id_livre, string $image, string $titre, int $nbPages, string $uploader = "")
    {
        $this->id_livre = $id_livre;
        $this->image = $image;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->uploader = $uploader;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id_livre;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id_livre): self {
        $this->id_livre = $id_livre;
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

    /**
     * Get the value of uploader
     *
     * @return string
     */
    public function getUploader(): string {
        return $this->uploader;
    }

    /**
     * Set the value of uploader
     *
     * @param string $uploader
     *
     * @return self
     */
    public function setUploader(string $uploader): self {
        $this->uploader = $uploader;
        return $this;
    }
}
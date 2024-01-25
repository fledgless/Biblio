<?php

class User
{
    public int $id;
    public string $pseudo;
    private string $passwrd;
    public string $email;
    public string $adresse;
    public bool $isValide;

    public function __construct(int $id, string $pseudo, string $passwrd, string $email, string $adresse)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->passwrd = $passwrd;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->isValide = false;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of identifiant
     *
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * Set the value of identifiant
     *
     * @param string $identifiant
     *
     * @return self
     */
    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPasswrd(): string
    {
        return $this->passwrd;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPasswrd(string $passwrd): self
    {
        $this->passwrd = $passwrd;
        return $this;
    }

    /**
     * Get the value of isValide
     *
     * @return bool
     */
    public function getIsValide(): bool
    {
        return $this->isValide;
    }

    /**
     * Set the value of isValide
     *
     * @param bool $isValide
     *
     * @return self
     */
    public function setIsValide(bool $isValide): self
    {
        $this->isValide = $isValide;
        return $this;
    }
}

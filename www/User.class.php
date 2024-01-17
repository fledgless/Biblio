<?php

class User {
    private int $userId;
    private string $pseudo;
    private string $email;
    private string $passwrd;
    private bool $estValide;
    private bool $estAdmin;

    public function __construct(int $userId, string $pseudo, string $email, string $passwrd, bool $estValide, bool $estAdmin)
    {
        $this->userId = $userId;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->passwrd = $passwrd;
        $this->estValide = $estValide;
        $this->estAdmin = $estAdmin;
    }

    /**
     * Get the value of userId
     *
     * @return int
     */
    public function getUserId(): int {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @param int $userId
     *
     * @return self
     */
    public function setUserId(int $userId): self {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Get the value of pseudo
     *
     * @return string
     */
    public function getPseudo(): string {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @param string $pseudo
     *
     * @return self
     */
    public function setPseudo(string $pseudo): self {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of passwrd
     *
     * @return string
     */
    public function getPasswrd(): string {
        return $this->passwrd;
    }

    /**
     * Set the value of passwrd
     *
     * @param string $passwrd
     *
     * @return self
     */
    public function setPasswrd(string $passwrd): self {
        $this->passwrd = $passwrd;
        return $this;
    }

    /**
     * Get the value of estValide
     *
     * @return bool
     */
    public function getEstValide(): bool {
        return $this->estValide;
    }

    /**
     * Set the value of estValide
     *
     * @param bool $estValide
     *
     * @return self
     */
    public function setEstValide(bool $estValide): self {
        $this->estValide = $estValide;
        return $this;
    }

    /**
     * Get the value of estAdmin
     *
     * @return bool
     */
    public function getEstAdmin(): bool {
        return $this->estAdmin;
    }

    /**
     * Set the value of estAdmin
     *
     * @param bool $estAdmin
     *
     * @return self
     */
    public function setEstAdmin(bool $estAdmin): self {
        $this->estAdmin = $estAdmin;
        return $this;
    }
}
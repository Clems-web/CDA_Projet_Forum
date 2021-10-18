<?php

namespace Cleme\Forum\Model\Entity;

class User {

    private ?int $id;
    private ?string $username;
    private ?string $mail;
    private ?string $password;
    private ?string $token;
    private ?int $confirmed;
    private ?int $role;


    /**
     * User constructor
     * @param int|null $id
     * @param string $username
     * @param string $mail
     * @param string $password
     * @param string $token
     * @param int $confirmed
     * @param int $role
     */
    public function __construct(?int $id, string $username, string $mail, string $password, string $token, int $confirmed, int $role) {
        $this->id = $id;
        $this->username = $username;
        $this->mail = $mail;
        $this->password = $password;
        $this->token = $token;
        $this->confirmed = $confirmed;
        $this->role = $role;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     */
    public function setMail(?string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     */
    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return int|null
     */
    public function getConfirmed(): ?int
    {
        return $this->confirmed;
    }

    /**
     * @param int|null $confirmed
     */
    public function setConfirmed(?int $confirmed): void
    {
        $this->confirmed = $confirmed;
    }

    /**
     * @return int|null
     */
    public function getRole(): ?int
    {
        return $this->role;
    }

    /**
     * @param int|null $role
     */
    public function setRole(?int $role): void
    {
        $this->role = $role;
    }



}
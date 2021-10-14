<?php

namespace Cleme\Forum\Model\Entity;

class Commentary {

    private ?int $id;
    private ?string $content;
    private ?int $subject_fk;
    private ?int $user_fk;

    public function __construct(?int $id, ?string $content, ?int $subject_fk, ?int $user_fk) {
        $this->id = $id;
        $this->content = $content;
        $this->subject_fk = $subject_fk;
        $this->user_fk = $user_fk;
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
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return int|null
     */
    public function getSubjectFk(): ?int
    {
        return $this->subject_fk;
    }

    /**
     * @param int|null $subject_fk
     */
    public function setSubjectFk(?int $subject_fk): void
    {
        $this->subject_fk = $subject_fk;
    }

    /**
     * @return int|null
     */
    public function getUserFk(): ?int
    {
        return $this->user_fk;
    }

    /**
     * @param int|null $user_fk
     */
    public function setUserFk(?int $user_fk): void
    {
        $this->user_fk = $user_fk;
    }


}
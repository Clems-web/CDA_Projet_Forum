<?php

namespace Cleme\Forum\Model\Entity;

class Subject {

    private ?int $id;
    private ?string $title;
    private ?string $content;
    private ?string $date;
    private ?int $category_fk;

    /**
     * Subject constructor
     * @param int|null $id
     * @param string|null $title
     * @param string|null $content
     * @param string|null $date
     * @param int|null $category_fk
     */
    public function __construct(?int $id, ?string $title, ?string $content,?string $date, ?int $category_fk) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->category_fk = $category_fk;
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
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
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int|null
     */
    public function getCategoryFk(): ?int
    {
        return $this->category_fk;
    }

    /**
     * @param int|null $category_fk
     */
    public function setCategoryFk(?int $category_fk): void
    {
        $this->category_fk = $category_fk;
    }




}
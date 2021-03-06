<?php

class Subject {

    private ?int $id;
    private ?string $content;
    private ?int $category_fk;

    /**
     * Subject constructor
     * @param int|null $id
     * @param string|null $content
     * @param int|null $category_fk
     */
    public function __construct(?int $id, ?string $content, ?int $category_fk) {
        $this->id = $id;
        $this->content = $content;
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
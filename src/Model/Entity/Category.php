<?php

namespace Cleme\Forum\Model\Entity;

class Category {
    private ?int $id;
    private ?string $categoryName;


    /**
     * category constructor
     * @param int|null $id
     * @param string|null $categoryName
     */
    public function __construct(?int $id, ?string $categoryName) {
        $this->id = $id;
        $this->categoryName = $categoryName;
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
    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    /**
     * @param string|null $categoryName
     */
    public function setCategoryName(?string $categoryName): void
    {
        $this->categoryName = $categoryName;
    }




}
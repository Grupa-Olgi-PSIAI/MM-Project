<?php


namespace model;


use core\Model;

class File extends Model
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var null|string
     */
    private $name;

    /**
     * @var string category of file e.g. invoice, document etc.
     */
    private $category;

    /**
     * @var null|int
     */
    private $size;

    /**
     * @var null|string
     */
    private $type;

    /**
     * @var string
     */
    private $path;

    /**
     * Get fields for database
     * @return array with all class fields and their values
     */
    public function getFields(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return File
     */
    public function setId(int $id): File
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return File
     */
    public function setName(?string $name): File
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string category of file e.g. invoice, document etc.
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category of file e.g. invoice, document etc.
     * @return File
     */
    public function setCategory(string $category): File
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @param int|null $size
     * @return File
     */
    public function setSize(?int $size): File
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     * @return File
     */
    public function setType(?string $type): File
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return File
     */
    public function setPath(string $path): File
    {
        $this->path = $path;
        return $this;
    }
}

<?php

namespace model;

use core\Model;

class Document extends Model
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $version;

    /**
     * @var string
     */
    private $date_created;

    /**
     * @var string
     */
    private $last_updated;

    /**
     * @var string
     */
    private $id_internal;

    /**
     * @var null|string
     */
    private $description;

    /**
     * @var null|int
     */
    private $contractor_id;

    /**
     * @var null|int
     */
    private $file_id;

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
     * @return Document
     */
    public function setId(int $id): Document
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return Document
     */
    public function setVersion(int $version): Document
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateCreated(): string
    {
        return $this->date_created;
    }

    /**
     * @param string $date_created
     * @return Document
     */
    public function setDateCreated(string $date_created): Document
    {
        $this->date_created = $date_created;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastUpdated(): string
    {
        return $this->last_updated;
    }

    /**
     * @param string $last_updated
     * @return Document
     */
    public function setLastUpdated(string $last_updated): Document
    {
        $this->last_updated = $last_updated;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdInternal(): string
    {
        return $this->id_internal;
    }

    /**
     * @param string $id_internal
     * @return Document
     */
    public function setIdInternal(string $id_internal): Document
    {
        $this->id_internal = $id_internal;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     * @return Document
     */
    public function setDescription(?string $description): Document
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getContractorId(): ?int
    {
        return $this->contractor_id;
    }

    /**
     * @param int|null $contractor_id
     * @return Document
     */
    public function setContractorId(?int $contractor_id): Document
    {
        $this->contractor_id = $contractor_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileId(): ?int
    {
        return $this->file_id;
    }

    /**
     * @param int|null $file_id
     * @return Document
     */
    public function setFileId(?int $file_id): Document
    {
        $this->file_id = $file_id;
        return $this;
    }
}

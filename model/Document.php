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
     * @var \DateTime
     */
    private $date_created;

    /**
     * @var \DateTime
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
     * @return \DateTime
     */
    public function getDateCreated(): \DateTime
    {
        return new \DateTime($this->date_created);
    }

    /**
     * @param \DateTime $date_created
     * @return Document
     */
    public function setDateCreated(\DateTime $date_created): Document
    {
        $this->date_created = $date_created;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated(): \DateTime
    {
        return new \DateTime($this->last_updated);
    }

    /**
     * @param \DateTime $last_updated
     * @return Document
     */
    public function setLastUpdated(\DateTime $last_updated): Document
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
}

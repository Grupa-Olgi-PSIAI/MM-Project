<?php

namespace model;

use core\Model;

class Contractor extends Model
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
    private $name;

    /**
     * @var string
     */
    private $vat_id;

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
     * @return Contractor
     */
    public function setId(int $id): Contractor
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
     * @return Contractor
     */
    public function setVersion(int $version): Contractor
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
     * @return Contractor
     */
    public function setDateCreated(string $date_created): Contractor
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
     * @return Contractor
     */
    public function setLastUpdated(string $last_updated): Contractor
    {
        $this->last_updated = $last_updated;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Contractor
     */
    public function setName(string $name): Contractor
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatId(): string
    {
        return $this->vat_id;
    }

    /**
     * @param string $vat_id
     * @return Contractor
     */
    public function setVatId(string $vat_id): Contractor
    {
        $this->vat_id = $vat_id;
        return $this;
    }
}

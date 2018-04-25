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
     * @return \DateTime
     */
    public function getDateCreated(): \DateTime
    {
        return $this->date_created;
    }

    /**
     * @param \DateTime $date_created
     * @return Contractor
     */
    public function setDateCreated(\DateTime $date_created): Contractor
    {
        $this->date_created = $date_created;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated(): \DateTime
    {
        return $this->last_updated;
    }

    /**
     * @param \DateTime $last_updated
     * @return Contractor
     */
    public function setLastUpdated(\DateTime $last_updated): Contractor
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

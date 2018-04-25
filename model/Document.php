<?php
namespace model;
use core\Model;

class Document extends Model
{
    private $id;
    private $version;
    private $date_created;
    private $last_updated;
    private $id_internal;
    private $description;
    private $contractor_id;

    public function getFields(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version): void
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param mixed $date_created
     */
    public function setDateCreated($date_created): void
    {
        $this->date_created = $date_created;
    }

    /**
     * @return mixed
     */
    public function getLastUpdated()
    {
        return $this->last_updated;
    }

    /**
     * @param mixed $last_updated
     */
    public function setLastUpdated($last_updated): void
    {
        $this->last_updated = $last_updated;
    }

    /**
     * @return mixed
     */
    public function getIdInternal()
    {
        return $this->id_internal;
    }

    /**
     * @param mixed $id_internal
     */
    public function setIdInternal($id_internal): void
    {
        $this->id_internal = $id_internal;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getContractorId()
    {
        return $this->contractor_id;
    }

    /**
     * @param mixed $contractor_id
     */
    public function setContractorId($contractor_id): void
    {
        $this->contractor_id = $contractor_id;
    }
}

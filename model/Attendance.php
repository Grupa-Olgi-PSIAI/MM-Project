<?php
namespace model;
use core\Model;

class Attendance extends Model
{
    private $id;
    private $version;
    private $date_created;
    private $last_updated;
    private $user_id;
    private $time_in;
    private $time_out;
    private $notes;

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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getTimeIn()
    {
        return $this->time_in;
    }

    /**
     * @param mixed $time_in
     */
    public function setTimeIn($time_in): void
    {
        $this->time_in = $time_in;
    }

    /**
     * @return mixed
     */
    public function getTimeOut()
    {
        return $this->time_out;
    }

    /**
     * @param mixed $time_out
     */
    public function setTimeOut($time_out): void
    {
        $this->time_out = $time_out;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $notes;
    }
}

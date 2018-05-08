<?php

namespace model;

use core\Model;

class Attendance extends Model
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
    private $user_id;

    /**
     * @var string
     */
    private $time_in;

    /**
     * @var string
     */
    private $time_out;

    /**
     * @var string
     */
    private $notes;


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
     * @return Attendance
     */
    public function setId(int $id): Attendance
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
     * @return Attendance
     */
    public function setVersion(int $version): Attendance
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
     * @return Attendance
     */
    public function setDateCreated(string $date_created): Attendance
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
     * @return Attendance
     */
    public function setLastUpdated(string $last_updated): Attendance
    {
        $this->last_updated = $last_updated;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     * @return Attendance
     */
    public function setUserId(string $user_id): Attendance
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeIn(): string
    {
        return $this->time_in;
    }

    /**
     * @param string $time_in
     * @return Attendance
     */
    public function setTimeIn(string $time_in): Attendance
    {
        $this->time_in = $time_in;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeOut(): string
    {
        return $this->time_out;
    }

    /**
     * @param string $time_out
     * @return Attendance
     */
    public function setTimeOut(string $time_out): Attendance
    {
        $this->time_out = $time_out;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Attendance
     */
    public function setNotes(string $notes): Attendance
    {
        $this->notes = $notes;
        return $this;
    }
}
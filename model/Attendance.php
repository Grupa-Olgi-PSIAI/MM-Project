<?php

namespace model;

use core\Model;
use util\DateUtils;

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
     * @var int
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
     * @var null|string
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
     * @return \DateTime
     */
    public function getDateCreated(): \DateTime
    {
        return new \DateTime($this->date_created);
    }

    /**
     * @param string $date_created
     * @return Attendance
     */
    public function setDateCreated(string $date_created): Attendance
    {
        $dateTime = new \DateTime($date_created);
        $this->date_created = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
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
     * @param string $last_updated
     * @return Attendance
     */
    public function setLastUpdated(string $last_updated): Attendance
    {
        $dateTime = new \DateTime($last_updated);
        $this->last_updated = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return Attendance
     */
    public function setUserId(int $user_id): Attendance
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimeIn(): \DateTime
    {
        return new \DateTime($this->time_in);
    }

    /**
     * @param string $time_in
     * @return Attendance
     */
    public function setTimeIn(string $time_in): Attendance
    {
        $dateTime = new \DateTime($time_in);
        $this->time_in = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimeOut(): \DateTime
    {
        return new \DateTime($this->time_out);
    }

    /**
     * @param string $time_out
     * @return Attendance
     */
    public function setTimeOut(string $time_out): Attendance
    {
        $dateTime = new \DateTime($time_out);
        $this->time_out = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
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

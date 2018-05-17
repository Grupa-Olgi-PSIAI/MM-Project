<?php


namespace model;


class AttendanceView
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $timeIn;

    /**
     * @var string
     */
    private $timeOut;

    /**
     * @var null|string
     */
    private $notes;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AttendanceView
     */
    public function setId(int $id): AttendanceView
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return AttendanceView
     */
    public function setUserName(string $userName): AttendanceView
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeIn(): string
    {
        return $this->timeIn;
    }

    /**
     * @param string $timeIn
     * @return AttendanceView
     */
    public function setTimeIn(string $timeIn): AttendanceView
    {
        $this->timeIn = $timeIn;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeOut(): string
    {
        return $this->timeOut;
    }

    /**
     * @param string $timeOut
     * @return AttendanceView
     */
    public function setTimeOut(string $timeOut): AttendanceView
    {
        $this->timeOut = $timeOut;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param null|string $notes
     * @return AttendanceView
     */
    public function setNotes(?string $notes): AttendanceView
    {
        $this->notes = $notes;
        return $this;
    }
}

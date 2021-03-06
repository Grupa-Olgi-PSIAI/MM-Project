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
    private $dateIn;

    /**
     * @var string
     */
    private $timeIn;

    /**
     * @var string
     */
    private $dateOut;

    /**
     * @var string
     */
    private $timeOut;

    /**
     * @var \DateInterval
     */
    private $workTime;

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

    /**
     * @return string
     */
    public function getDateIn(): string
    {
        return $this->dateIn;
    }

    /**
     * @param string $dateIn
     * @return AttendanceView
     */
    public function setDateIn(string $dateIn): AttendanceView
    {
        $this->dateIn = $dateIn;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateOut(): string
    {
        return $this->dateOut;
    }

    /**
     * @param string $dateOut
     * @return AttendanceView
     */
    public function setDateOut(string $dateOut): AttendanceView
    {
        $this->dateOut = $dateOut;
        return $this;
    }

    /**
     * @return \DateInterval
     */
    public function getWorkTime(): \DateInterval
    {
        return $this->workTime;
    }

    /**
     * @param \DateInterval $workTime
     * @return AttendanceView
     */
    public function setWorkTime(\DateInterval $workTime): AttendanceView
    {
        $this->workTime = $workTime;
        return $this;
    }
}

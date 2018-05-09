<?php


namespace model;


class LicenseView
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $dateCreated;

    /**
     * @var string
     */
    private $lastUpdated;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $inventoryNumber;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $serialKey;

    /**
     * @var string
     */
    private $validationDate;

    /**
     * @var string
     */
    private $techSupportEndDate;

    /**
     * @var string
     */
    private $purchaseDate;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var null|int
     */
    private $fileId;

    /**
     * @var int
     */
    private $invoiceId;

    /**
     * @var string
     */
    private $invoiceNumber;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return LicenseView
     */
    public function setId(int $id): LicenseView
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateCreated(): string
    {
        return $this->dateCreated;
    }

    /**
     * @param string $dateCreated
     * @return LicenseView
     */
    public function setDateCreated(string $dateCreated): LicenseView
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastUpdated(): string
    {
        return $this->lastUpdated;
    }

    /**
     * @param string $lastUpdated
     * @return LicenseView
     */
    public function setLastUpdated(string $lastUpdated): LicenseView
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return LicenseView
     */
    public function setUserId(int $userId): LicenseView
    {
        $this->userId = $userId;
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
     * @return LicenseView
     */
    public function setUserName(string $userName): LicenseView
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getInventoryNumber(): string
    {
        return $this->inventoryNumber;
    }

    /**
     * @param string $inventoryNumber
     * @return LicenseView
     */
    public function setInventoryNumber(string $inventoryNumber): LicenseView
    {
        $this->inventoryNumber = $inventoryNumber;
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
     * @return LicenseView
     */
    public function setName(string $name): LicenseView
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSerialKey(): string
    {
        return $this->serialKey;
    }

    /**
     * @param string $serialKey
     * @return LicenseView
     */
    public function setSerialKey(string $serialKey): LicenseView
    {
        $this->serialKey = $serialKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidationDate(): string
    {
        return $this->validationDate;
    }

    /**
     * @param string $validationDate
     * @return LicenseView
     */
    public function setValidationDate(string $validationDate): LicenseView
    {
        $this->validationDate = $validationDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getTechSupportEndDate(): string
    {
        return $this->techSupportEndDate;
    }

    /**
     * @param string $techSupportEndDate
     * @return LicenseView
     */
    public function setTechSupportEndDate(string $techSupportEndDate): LicenseView
    {
        $this->techSupportEndDate = $techSupportEndDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPurchaseDate(): string
    {
        return $this->purchaseDate;
    }

    /**
     * @param string $purchaseDate
     * @return LicenseView
     */
    public function setPurchaseDate(string $purchaseDate): LicenseView
    {
        $this->purchaseDate = $purchaseDate;
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
     * @return LicenseView
     */
    public function setNotes(string $notes): LicenseView
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileId(): ?int
    {
        return $this->fileId;
    }

    /**
     * @param int|null $fileId
     * @return LicenseView
     */
    public function setFileId(?int $fileId): LicenseView
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return int
     */
    public function getInvoiceId(): int
    {
        return $this->invoiceId;
    }

    /**
     * @param int $invoiceId
     * @return LicenseView
     */
    public function setInvoiceId(int $invoiceId): LicenseView
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    /**
     * @param string $invoiceNumber
     * @return LicenseView
     */
    public function setInvoiceNumber(string $invoiceNumber): LicenseView
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }
}

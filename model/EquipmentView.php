<?php


namespace model;


class EquipmentView
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
     * @var null|int
     */
    private $invoiceId;

    /**
     * @var null|string
     */
    private $invoiceNumber;

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
    private $serialNumber;

    /**
     * @var string
     */
    private $validationDate;

    /**
     * @var null|string
     */
    private $purchaseDate;

    /**
     * @var float
     */
    private $priceNet;

    /**
     * @var string
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
     * @return EquipmentView
     */
    public function setId(int $id): EquipmentView
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
     * @return EquipmentView
     */
    public function setDateCreated(string $dateCreated): EquipmentView
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
     * @return EquipmentView
     */
    public function setLastUpdated(string $lastUpdated): EquipmentView
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
     * @return EquipmentView
     */
    public function setUserId(int $userId): EquipmentView
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
     * @return EquipmentView
     */
    public function setUserName(string $userName): EquipmentView
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInvoiceId(): ?int
    {
        return $this->invoiceId;
    }

    /**
     * @param int|null $invoiceId
     * @return EquipmentView
     */
    public function setInvoiceId(?int $invoiceId): EquipmentView
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    /**
     * @param null|string $invoiceNumber
     * @return EquipmentView
     */
    public function setInvoiceNumber(?string $invoiceNumber): EquipmentView
    {
        $this->invoiceNumber = $invoiceNumber;
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
     * @return EquipmentView
     */
    public function setInventoryNumber(string $inventoryNumber): EquipmentView
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
     * @return EquipmentView
     */
    public function setName(string $name): EquipmentView
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSerialNumber(): string
    {
        return $this->serialNumber;
    }

    /**
     * @param string $serialNumber
     * @return EquipmentView
     */
    public function setSerialNumber(string $serialNumber): EquipmentView
    {
        $this->serialNumber = $serialNumber;
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
     * @return EquipmentView
     */
    public function setValidationDate(string $validationDate): EquipmentView
    {
        $this->validationDate = $validationDate;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPurchaseDate(): ?string
    {
        return $this->purchaseDate;
    }

    /**
     * @param null|string $purchaseDate
     * @return EquipmentView
     */
    public function setPurchaseDate(?string $purchaseDate): EquipmentView
    {
        $this->purchaseDate = $purchaseDate;
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceNet(): float
    {
        return $this->priceNet;
    }

    /**
     * @param float $priceNet
     * @return EquipmentView
     */
    public function setPriceNet(float $priceNet): EquipmentView
    {
        $this->priceNet = $priceNet;
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
     * @return EquipmentView
     */
    public function setNotes(string $notes): EquipmentView
    {
        $this->notes = $notes;
        return $this;
    }
}

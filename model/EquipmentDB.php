<?php


namespace model;


use core\Model;
use util\DateUtils;

class EquipmentDB extends Model
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
     * @var null|int
     */
    private $invoice_id;

    /**
     * @var string
     */
    private $inventory_number;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $serial_number;

    /**
     * @var string
     */
    private $validation_date;

    /**
     * @var null|string
     */
    private $purchase_date;

    /**
     * @var float
     */
    private $price_net;

    /**
     * @var string
     */
    private $notes;


    /**
     * Get fields for database
     * @return array with all class fields and their values
     */
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
     * @return EquipmentDB
     */
    public function setId(int $id): EquipmentDB
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
     * @return EquipmentDB
     */
    public function setVersion(int $version): EquipmentDB
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
     * @return EquipmentDB
     */
    public function setDateCreated(string $date_created): EquipmentDB
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
     * @return EquipmentDB
     */
    public function setLastUpdated(string $last_updated): EquipmentDB
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
     * @return EquipmentDB
     */
    public function setUserId(int $user_id): EquipmentDB
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInvoiceId(): ?int
    {
        return $this->invoice_id;
    }

    /**
     * @param int|null $invoice_id
     * @return EquipmentDB
     */
    public function setInvoiceId(?int $invoice_id): EquipmentDB
    {
        $this->invoice_id = $invoice_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getInventoryNumber(): string
    {
        return $this->inventory_number;
    }

    /**
     * @param string $inventory_number
     * @return EquipmentDB
     */
    public function setInventoryNumber(string $inventory_number): EquipmentDB
    {
        $this->inventory_number = $inventory_number;
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
     * @return EquipmentDB
     */
    public function setName(string $name): EquipmentDB
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSerialNumber(): string
    {
        return $this->serial_number;
    }

    /**
     * @param string $serial_number
     * @return EquipmentDB
     */
    public function setSerialNumber(string $serial_number): EquipmentDB
    {
        $this->serial_number = $serial_number;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getValidationDate(): \DateTime
    {
        return new \DateTime($this->validation_date);
    }

    /**
     * @param string $validation_date
     * @return EquipmentDB
     */
    public function setValidationDate(string $validation_date): EquipmentDB
    {
        $dateTime = new \DateTime($validation_date);
        $this->validation_date = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getPurchaseDate(): ?\DateTime
    {
        if ($this->purchase_date === null) {
            return null;
        } else {
            return new \DateTime($this->purchase_date);
        }
    }

    /**
     * @param null|string $purchase_date
     * @return EquipmentDB
     */
    public function setPurchaseDate(?string $purchase_date): EquipmentDB
    {
        if ($purchase_date === null) {
            $this->purchase_date = null;
        } else {
            $dateTime = new \DateTime($purchase_date);
            $this->purchase_date = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
        }
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceNet(): float
    {
        return $this->price_net;
    }

    /**
     * @param float $price_net
     * @return EquipmentDB
     */
    public function setPriceNet(float $price_net): EquipmentDB
    {
        $this->price_net = $price_net;
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
     * @return EquipmentDB
     */
    public function setNotes(string $notes): EquipmentDB
    {
        $this->notes = $notes;
        return $this;
    }
}

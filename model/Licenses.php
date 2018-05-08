<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 25.04.2018
 * Time: 21:35
 */

namespace model;

use core\Model;
use util\DateUtils;

class Licenses extends Model
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
    private $inventory_number;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $serial_key;

    /**
     * @var string
     */
    private $validation_date;

    /**
     * @var string
     */
    private $tech_support_end_date;

    /**
     * @var string
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
     * @var null|int
     */
    private $file_id;

    /**
     * @var int
     */
    private $invoice_id;

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
     * @return Licenses
     */
    public function setId(int $id): Licenses
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
     * @return Licenses
     */
    public function setVersion(int $version): Licenses
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
     * @return Licenses
     */
    public function setDateCreated(string $date_created): Licenses
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
     * @return Licenses
     */
    public function setLastUpdated(string $last_updated): Licenses
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
     * @return Licenses
     */
    public function setUserId(int $user_id): Licenses
    {
        $this->user_id = $user_id;
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
     * @return Licenses
     */
    public function setInventoryNumber(string $inventory_number): Licenses
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
     * @return Licenses
     */
    public function setName(string $name): Licenses
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSerialKey(): string
    {
        return $this->serial_key;
    }

    /**
     * @param string $serial_key
     * @return Licenses
     */
    public function setSerialKey(string $serial_key): Licenses
    {
        $this->serial_key = $serial_key;
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
     * @return Licenses
     */
    public function setValidationDate(string $validation_date): Licenses
    {
        $dateTime = new \DateTime($validation_date);
        $this->validation_date = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTechSupportEndDate(): \DateTime
    {
        return new \DateTime($this->tech_support_end_date);
    }

    /**
     * @param string $tech_support_end_date
     * @return Licenses
     */
    public function setTechSupportEndDate(string $tech_support_end_date): Licenses
    {
        $dateTime = new \DateTime($tech_support_end_date);
        $this->tech_support_end_date = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPurchaseDate(): \DateTime
    {
        return new \DateTime($this->purchase_date);
    }

    /**
     * @param string $purchase_date
     * @return Licenses
     */
    public function setPurchaseDate(string $purchase_date): Licenses
    {
        $dateTime = new \DateTime($purchase_date);
        $this->purchase_date = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
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
     * @return Licenses
     */
    public function setPriceNet(float $price_net): Licenses
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
     * @return Licenses
     */
    public function setNotes(string $notes): Licenses
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileId(): ?int
    {
        return $this->file_id;
    }

    /**
     * @param int|null $file_id
     * @return Licenses
     */
    public function setFileId(?int $file_id): Licenses
    {
        $this->file_id = $file_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getInvoiceId(): int
    {
        return $this->invoice_id;
    }

    /**
     * @param int $invoice_id
     * @return Licenses
     */
    public function setInvoiceId(int $invoice_id): Licenses
    {
        $this->invoice_id = $invoice_id;
        return $this;
    }
}

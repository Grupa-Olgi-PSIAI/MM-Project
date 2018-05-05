<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 25.04.2018
 * Time: 21:35
 */

namespace model;

use core\Model;

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
    private $inventary_number;

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
     * @return string
     */
    public function getDateCreated(): string
    {
        return $this->date_created;
    }

    /**
     * @param string $date_created
     * @return Licenses
     */
    public function setDateCreated(string $date_created): Licenses
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
     * @return Licenses
     */
    public function setLastUpdated(string $last_updated): Licenses
    {
        $this->last_updated = $last_updated;
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
    public function getInventaryNumber(): string
    {
        return $this->inventary_number;
    }

    /**
     * @param string $inventary_number
     * @return Licenses
     */
    public function setInventaryNumber(string $inventary_number): Licenses
    {
        $this->inventary_number = $inventary_number;
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
     * @return string
     */
    public function getValidationDate(): string
    {
        return $this->validation_date;
    }

    /**
     * @param string $validation_date
     * @return Licenses
     */
    public function setValidationDate(string $validation_date): Licenses
    {
        $this->validation_date = $validation_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getTechSupportEndDate(): string
    {
        return $this->tech_support_end_date;
    }

    /**
     * @param string $tech_support_end_date
     * @return Licenses
     */
    public function setTechSupportEndDate(string $tech_support_end_date): Licenses
    {
        $this->tech_support_end_date = $tech_support_end_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getPurchaseDate(): string
    {
        return $this->purchase_date;
    }

    /**
     * @param string $purchase_date
     * @return Licenses
     */
    public function setPurchaseDate(string $purchase_date): Licenses
    {
        $this->purchase_date = $purchase_date;
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
}

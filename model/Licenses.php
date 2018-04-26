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
    private $id;
    private $version;
    private $date_created;
    private $last_updated;
    private $user_id;
    private $inventary_number;
    private $name;
    private $serial_key;
    private $validation_date;
    private $tech_support_end_date;
    private $purchase_date;
    private $price_net;
    private $notes;

    public function getFields(): array
    {
        return get_object_vars($this);
    }
    public function setId(int $id): Licenses
    {
        $this->id = $id;
        return $this;
    }
    public function setVersion(int $version): Licenses
    {
        $this->version = $version;
        return $this;
    }
    public function setDateCreated(string $date_created): Licenses
    {
        $this->date_created = $date_created;
        return $this;
    }
    public function setLastUpdated(string $last_updated): Licenses
    {
        $this->last_updated = $last_updated;
        return $this;
    }
    public function setUserId(int $user_id): Licenses
     {
         $this->user_id = $user_id;
         return $this;
     }
    public function setInventaryNumber(string $inventary_number): Licenses
     {
         $this->inventary_number = $inventary_number;
         return $this;
     }
    public function setName(string $name): Licenses
     {
         $this->name = $name;
         return $this;
     }
    public function setSerialKey(string $serial_key): Licenses
     {
         $this->serial_key = $serial_key;
         return $this;
     }
    public function setValidationDate(string $validation_date): Licenses
     {
         $this->validation_date = $validation_date;
         return $this;
     }
    public function setTechSupportEndDate(string $tech_support_end_date): Licenses
     {
         $this->tech_support_end_date = $tech_support_end_date;
         return $this;
     }
    public function setPurchaseDate(string $purchase_date): Licenses
     {
         $this->purchase_date = $purchase_date;
         return $this;
     }
    public function setPriceNet(float $price_net): Licenses
     {
         $this->price_net = $price_net;
         return $this;
     }
    public function setNotes(string $notes): Licenses
    {
        $this->notes = $notes;
        return $this;
    }


    public function getId(): int
    {
         return $this->id;
    }
    public function getVersion(): int
    {
        return $this->version;
    }
    public function getDateCreated(): string
    {
        return $this->date_created;
    }
    public function getlastUpdated(): string
    {
        return $this->last_updated;
    }
    public function getUserId(): int
    {
        return $this->user_id;
    }
    public function getInventaryNumber(): string
    {
        return $this->inventary_number;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getSerialKey(): string
    {
        return $this->serial_key;
    }
    public function getValidationDate(): string
    {
        return $this->validation_date;
    }
    public function getTechSupportEndDate(): string
    {
        return $this->tech_support_end_date;
    }
    public function getPurchaseDate(): string
    {
        return $this->purchase_date;
    }
    public function getPriceNet(): float
    {
        return $this->price_net;
    }
    public function getNotes(): string
    {
        return $this->notes;
    }

}
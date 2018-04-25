<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 25.04.2018
 * Time: 21:35
 */

namespace model;
use core\Model;

class License extends Model
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
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function setVersion($version): void
    {
        $this->version = $version;
    }
    public function setDateCreated($date_created): void
    {
        $this->date_created = $date_created;
    }
    public function setLastUpdated($last_updated): void
    {
        $this->last_updated = $last_updated;
    }
    public function setUserId($user_id): void
     {
         $this->user_id = $user_id;
     }
    public function setInventaryNumber($inventary_number): void
     {
         $this->inventary_number = $inventary_number;
     }
    public function setName($name): void
     {
         $this->name = $name;
     }
    public function setSerialKey($serial_key): void
     {
         $this->serial_key = $serial_key;
     }
    public function setValidationDate($validation_date): void
     {
         $this->validation_date = $validation_date;
     }
    public function setTechSupportEndDate($tech_support_end_date): void
     {
         $this->tech_support_end_date = $tech_support_end_date;
     }
    public function setPurchaseDate($purchase_date): void
     {
         $this->purchase_date = $purchase_date;
     }
    public function setPriceNet($price_net): void
     {
         $this->price_net = $price_net;
     }
    public function setNotes($notes): void
    {
        $this->notes = $notes;
    }


    public function getId(): void
    {
         return $this->id;
    }
    public function getVersion(): void
    {
        return $this->version;
    }
    public function getDateCreated(): void
    {
        return $this->date_created;
    }
    public function getlastUpdated(): void
    {
        return $this->last_updated;
    }
    public function getUserId(): void
    {
        return $this->user_id;
    }
    public function getInventaryNumber(): void
    {
        return $this->InventaryNumber;
    }
    public function getName(): void
    {
        return $this->name;
    }
    public function getSerialKey(): void
    {
        return $this->serial_key;
    }
    public function getValidationDate(): void
    {
        return $this->validation_date;
    }
    public function getTechSupportEndDate(): void
    {
        return $this->TechSupportEndDate;
    }
    public function getPurchaseDate(): void
    {
        return $this->purchase_date;
    }
    public function getPriceNet(): void
    {
        return $this->price_net;
    }
    public function getNotes(): void
    {
        return $this->notes;
    }

}
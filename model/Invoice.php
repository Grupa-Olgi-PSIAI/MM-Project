<?php

namespace model;

use core\Model;
use util\DateUtils;

class Invoice extends Model
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
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $invoice_date;

    /**
     * @var float
     */
    private $amount_net;

    /**
     * @var float
     */
    private $amount_gross;

    /**
     * @var float
     */
    private $amount_tax;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var float
     */
    private $amount_net_currency;

    /**
     * @var null|int
     */
    private $contractor_id;

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
     * @return Invoice
     */
    public function setId(int $id): Invoice
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
     * @return Invoice
     */
    public function setVersion(int $version): Invoice
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
     * @return Invoice
     */
    public function setDateCreated($date_created): string
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
     * @return Invoice
     */
    public function setLastUpdated($last_updated): Invoice
    {
        $dateTime = new \DateTime($last_updated);
        $this->last_updated = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Invoice
     */
    public function setNumber(string $number): Invoice
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInvoiceDate(): \DateTime
    {
        return new \DateTime($this->invoice_date);
    }

    /**
     * @param string $invoice_date
     * @return Invoice
     */
    public function setInvoiceDate(string $invoice_date): Invoice
    {
        $dateTime = new \DateTime($invoice_date);
        $this->invoice_date = $dateTime->format(DateUtils::$PATTERN_MYSQL_DATE_TIME);
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountNet(): float
    {
        return $this->amount_net;
    }

    /**
     * @param float $amount_net
     * @return Invoice
     */
    public function setAmountNet(float $amount_net): Invoice
    {
        $this->amount_net = $amount_net;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountGross(): float
    {
        return $this->amount_gross;
    }

    /**
     * @param float $amount_gross
     * @return Invoice
     */
    public function setAmountGross(float $amount_gross): Invoice
    {
        $this->amount_gross = $amount_gross;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountTax(): float
    {
        return $this->amount_tax;
    }

    /**
     * @param float $amount_tax
     * @return Invoice
     */
    public function setAmountTax(float $amount_tax): Invoice
    {
        $this->amount_tax = $amount_tax;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Invoice
     */
    public function setCurrency(string $currency): Invoice
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountNetCurrency(): float
    {
        return $this->amount_net_currency;
    }

    /**
     * @param float $amount_net_currency
     * @return Invoice
     */
    public function setAmountNetCurrency(float $amount_net_currency): Invoice
    {
        $this->amount_net_currency = $amount_net_currency;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getContractorId(): ?int
    {
        return $this->contractor_id;
    }

    /**
     * @param int|null $contractor_id
     * @return Invoice
     */
    public function setContractorId(?int $contractor_id): Invoice
    {
        $this->contractor_id = $contractor_id;
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
     * @return Invoice
     */
    public function setFileId(?int $file_id): Invoice
    {
        $this->file_id = $file_id;
        return $this;
    }
}

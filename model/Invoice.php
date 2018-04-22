<?php

namespace model;

use core\Model;

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
     * @var \DateTime
     */
    private $date_created;

    /**
     * @var \DateTime
     */
    private $last_updated;

    /**
     * @var int
     */
    private $number;

    /**
     * @var \DateTime
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
        return $this->date_created;
    }

    /**
     * @param \DateTime $date_created
     * @return Invoice
     */
    public function setDateCreated(\DateTime $date_created): Invoice
    {
        $this->date_created = $date_created;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated(): \DateTime
    {
        return $this->last_updated;
    }

    /**
     * @param \DateTime $last_updated
     * @return Invoice
     */
    public function setLastUpdated(\DateTime $last_updated): Invoice
    {
        $this->last_updated = $last_updated;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return Invoice
     */
    public function setNumber(int $number): Invoice
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInvoiceDate(): \DateTime
    {
        return $this->invoice_date;
    }

    /**
     * @param \DateTime $invoice_date
     * @return Invoice
     */
    public function setInvoiceDate(\DateTime $invoice_date): Invoice
    {
        $this->invoice_date = $invoice_date;
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
}

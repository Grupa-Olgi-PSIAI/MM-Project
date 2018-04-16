<?php
namespace model;
use core\Model;

class Invoice extends Model
{
    private $id;
    private $version;
    private $date_created;
    private $last_updated;
    private $number;
    private $invoice_date;
    private $amount_net;
    private $amount_gross;
    private $amount_tax;
    private $currency;
    private $amount_net_currency;
    private $contractor_id;

    public function getFields(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    
    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version): void
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param mixed $date_created
     */
    public function setDateCreated($date_created): void
    {
        $this->date_created = $date_created;
    }

    /**
     * @return mixed
     */
    public function getLastUpdated()
    {
        return $this->last_updated;
    }

    /**
     * @param mixed $last_updated
     */
    public function setLastUpdated($last_updated): void
    {
        $this->last_updated = $last_updated;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    /**
     * @param mixed $invoice_date
     */
    public function setInvoiceDate($invoice_date): void
    {
        $this->invoice_date = $invoice_date;
    }

    /**
     * @return mixed
     */
    public function getAmountNet()
    {
        return $this->amount_net;
    }

    /**
     * @param mixed $amount_net
     */
    public function setAmountNet($amount_net): void
    {
        $this->amount_net = $amount_net;
    }

    /**
     * @return mixed
     */
    public function getAmountGross()
    {
        return $this->amount_gross;
    }

    /**
     * @param mixed $amount_gross
     */
    public function setAmountGross($amount_gross): void
    {
        $this->amount_gross = $amount_gross;
    }

    /**
     * @return mixed
     */
    public function getAmountTax()
    {
        return $this->amount_tax;
    }

    /**
     * @param mixed $amount_tax
     */
    public function setAmountTax($amount_tax): void
    {
        $this->amount_tax = $amount_tax;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getAmountNetCurrency()
    {
        return $this->amount_net_currency;
    }

    /**
     * @param mixed $amount_net_currency
     */
    public function setAmountNetCurrency($amount_net_currency): void
    {
        $this->amount_net_currency = $amount_net_currency;
    }

    /**
     * @return mixed
     */
    public function getContractorId()
    {
        return $this->contractor_id;
    }

    /**
     * @param mixed $contractor_id
     */
    public function setContractorId($contractor_id): void
    {
        $this->contractor_id = $contractor_id;
    }
}

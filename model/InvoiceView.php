<?php


namespace model;


class InvoiceView
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
    private $number;

    /**
     * @var string
     */
    private $invoiceDate;

    /**
     * @var float
     */
    private $amountNet;

    /**
     * @var float
     */
    private $amountGross;

    /**
     * @var float
     */
    private $amountTax;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var float
     */
    private $amountNetCurrency;

    /**
     * @var null|string
     */
    private $contractor;

    /**
     * @var null|int
     */
    private $fileId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return InvoiceView
     */
    public function setId(int $id): InvoiceView
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
     * @return InvoiceView
     */
    public function setDateCreated(string $dateCreated): InvoiceView
    {
        $this->dateCreated = $dateCreated;
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
     * @return InvoiceView
     */
    public function setNumber(string $number): InvoiceView
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceDate(): string
    {
        return $this->invoiceDate;
    }

    /**
     * @param string $invoiceDate
     * @return InvoiceView
     */
    public function setInvoiceDate(string $invoiceDate): InvoiceView
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountNet(): float
    {
        return $this->amountNet;
    }

    /**
     * @param float $amountNet
     * @return InvoiceView
     */
    public function setAmountNet(float $amountNet): InvoiceView
    {
        $this->amountNet = $amountNet;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountGross(): float
    {
        return $this->amountGross;
    }

    /**
     * @param float $amountGross
     * @return InvoiceView
     */
    public function setAmountGross(float $amountGross): InvoiceView
    {
        $this->amountGross = $amountGross;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountTax(): float
    {
        return $this->amountTax;
    }

    /**
     * @param float $amountTax
     * @return InvoiceView
     */
    public function setAmountTax(float $amountTax): InvoiceView
    {
        $this->amountTax = $amountTax;
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
     * @return InvoiceView
     */
    public function setCurrency(string $currency): InvoiceView
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountNetCurrency(): float
    {
        return $this->amountNetCurrency;
    }

    /**
     * @param float $amountNetCurrency
     * @return InvoiceView
     */
    public function setAmountNetCurrency(float $amountNetCurrency): InvoiceView
    {
        $this->amountNetCurrency = $amountNetCurrency;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getContractor(): ?string
    {
        return $this->contractor;
    }

    /**
     * @param null|string $contractor
     * @return InvoiceView
     */
    public function setContractor(?string $contractor): InvoiceView
    {
        $this->contractor = $contractor;
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
     * @return InvoiceView
     */
    public function setFileId(?int $fileId): InvoiceView
    {
        $this->fileId = $fileId;
        return $this;
    }
}

<?php


namespace model;


class DocumentView
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
     * @var string
     */
    private $internalId;

    /**
     * @var null|string
     */
    private $description;

    /**
     * @var null|string
     */
    private $contractor;

    /**
     * @var null|int
     */
    private $contractorId;

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
     * @return DocumentView
     */
    public function setId(int $id): DocumentView
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
     * @return DocumentView
     */
    public function setDateCreated(string $dateCreated): DocumentView
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
     * @return DocumentView
     */
    public function setLastUpdated(string $lastUpdated): DocumentView
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalId(): string
    {
        return $this->internalId;
    }

    /**
     * @param string $internalId
     * @return DocumentView
     */
    public function setInternalId(string $internalId): DocumentView
    {
        $this->internalId = $internalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     * @return DocumentView
     */
    public function setDescription(?string $description): DocumentView
    {
        $this->description = $description;
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
     * @return DocumentView
     */
    public function setContractor(?string $contractor): DocumentView
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
     * @return DocumentView
     */
    public function setFileId(?int $fileId): DocumentView
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getContractorId(): ?int
    {
        return $this->contractorId;
    }

    /**
     * @param int|null $contractorId
     * @return DocumentView
     */
    public function setContractorId(?int $contractorId): DocumentView
    {
        $this->contractorId = $contractorId;
        return $this;
    }
}

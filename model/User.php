<?php


namespace model;


use core\Model;

class User extends Model
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
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $phone_number;

    /**
     * @var string|null
     */
    private $zipcode;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $street_with_no;

    /**
     * @var string|null
     */
    private $country_code;

    /**
     * @var string|null
     */
    private $city;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string
     */
    private $email;

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
     * @return User
     */
    public function setId(int $id): User
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
     * @return User
     */
    public function setVersion(int $version): User
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
     * @return User
     */
    public function setDateCreated(\DateTime $date_created): User
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
     * @return User
     */
    public function setLastUpdated(\DateTime $last_updated): User
    {
        $this->last_updated = $last_updated;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     * @return User
     */
    public function setFirstName(string $first_name): User
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     * @return User
     */
    public function setLastName(string $last_name): User
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * @param string $phone_number
     * @return User
     */
    public function setPhoneNumber(string $phone_number): User
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    /**
     * @param null|string $zipcode
     * @return User
     */
    public function setZipcode(?string $zipcode): User
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     * @return User
     */
    public function setAddress(?string $address): User
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getStreetWithNo(): ?string
    {
        return $this->street_with_no;
    }

    /**
     * @param null|string $street_with_no
     * @return User
     */
    public function setStreetWithNo(?string $street_with_no): User
    {
        $this->street_with_no = $street_with_no;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCountryCode(): ?string
    {
        return $this->country_code;
    }

    /**
     * @param null|string $country_code
     * @return User
     */
    public function setCountryCode(?string $country_code): User
    {
        $this->country_code = $country_code;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     * @return User
     */
    public function setCity(?string $city): User
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param null|string $status
     * @return User
     */
    public function setStatus(?string $status): User
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }
}

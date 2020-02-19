<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User implements \Symfony\Component\Security\Core\User\UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="timezone", type="string", length=45, nullable=true)
     *
     */
    private $timezone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message="El email {{ value }} no es válido!",
     *     checkMX=true
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=254, nullable=false)
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @ORM\Column(name="roles", type="json", length=45, nullable=false)
     */
    private $roles = [];

    /**
     * @var bool|null
     *
     * @ORM\Column(name="online", type="boolean", nullable=true)
     */
    private $online;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Regex("/[a-zA-Z]+/")
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="surname", type="string", length=45, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Regex("/[a-zA-Z]+/")
     */
    private $surname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=45, nullable=false)
     */
    private $gender;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime", nullable=false)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=1, nullable=true)
     */
    private $company;

    /**
     * @var string|null
     *
     * @ORM\Column(name="companyid", type="string", length=45, nullable=true)
     */
    private $companyid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coverimage", type="string", length=200, nullable=true)
     */
    private $coverimage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coverprofile", type="string", length=200, nullable=true)
     */
    private $coverprofile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo", type="text", length=1, nullable=false)
     */
    private $photo;

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $var): self
    {
        $this->photo = $var;

        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles()
    {
        return array(
            'ROLE_USER'
        );
    }

    public function getUsername(){
        return $this->email;
    }
    public function setRoles(string $role): self
    {
        $this->roles = $role;

        return $this;
    }

    public function getSalt() {}

    public function eraseCredentials() {}

    public function getOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(?bool $online): self
    {
        $this->online = $online;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany( $company)
    {
        $this->company = $company;

        return $this;
    }

    public function getCompanyid(): ?string
    {
        return $this->companyid;
    }

    public function setCompanyid(?string $companyid): self
    {
        $this->companyid = $companyid;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCoverimage(): ?string
    {
        return $this->coverimage;
    }

    public function setCoverimage(?string $coverimage): self
    {
        $this->coverimage = $coverimage;

        return $this;
    }

    public function getCoverprofile(): ?string
    {
        return $this->coverprofile;
    }

    public function setCoverprofile(?string $coverprofile): self
    {
        $this->coverprofile = $coverprofile;

        return $this;
    }


}

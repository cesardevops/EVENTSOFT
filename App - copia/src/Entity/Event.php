<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event", indexes={@ORM\Index(name="fk_event_categorie1_idx", columns={"categorie_id"}), @ORM\Index(name="fk_event_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_event_classification1_idx", columns={"classification_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(name="shortdescription", type="text", length=0, nullable=false)
     */
    private $shortdescription;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=false)
     */
    private $startDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="duration", type="time", nullable=false)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="cover_image", type="string", length=255, nullable=false)
     */
    private $coverImage;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb", type="text", length=0, nullable=true)
     */
    private $thumb;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="addressname", type="string", length=100, nullable=true)
     */
    private $addressname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lat", type="string", length=45, nullable=true)
     */
    private $lat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longt", type="string", length=45, nullable=true)
     */
    private $longt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wordskeys", type="text", length=0, nullable=true)
     */
    private $wordskeys;

    /**
     * @var bool
     *
     * @ORM\Column(name="showguestlist", type="boolean", nullable=false)
     */
    private $showguestlist = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="interest", type="integer", nullable=true)
     */
    private $interest = '0';

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     * })
     */
    private $categorised;

    /**
     * @var Classification
     *
     * @ORM\ManyToOne(targetEntity="Classification")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="classification_id", referencedColumnName="id")
     * })
     */
    private $classification;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortdescription;
    }

    public function setShortDescription(string $name): self
    {
        $this->shortdescription = $name;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(string $coverImage): self
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    public function setThumb(string $thumb): self
    {
        $this->thumb = $thumb;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAddressname(): ?string
    {
        return $this->addressname;
    }

    public function setAddressname(?string $addressname): self
    {
        $this->addressname = $addressname;

        return $this;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(?string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLongt(): ?string
    {
        return $this->longt;
    }

    public function setLongt(?string $longt): self
    {
        $this->longt = $longt;

        return $this;
    }

    public function getWordskeys(): ?string
    {
        return $this->wordskeys;
    }

    public function setWordskeys(?string $wordskeys): self
    {
        $this->wordskeys = $wordskeys;

        return $this;
    }

    public function getShowguestlist(): ?bool
    {
        return $this->showguestlist;
    }

    public function setShowguestlist(bool $showguestlist): self
    {
        $this->showguestlist = $showguestlist;

        return $this;
    }

    public function getInterest(): ?int
    {
        return $this->interest;
    }

    public function setInterest(?int $interest): self
    {
        $this->interest = $interest;

        return $this;
    }

    public function getCategorised(): ?Category
    {
        return $this->categorised;
    }

    public function setCategorised(?Category $categorised): self
    {
        $this->categorised = $categorised;

        return $this;
    }

    public function getClassification(): ?Classification
    {
        return $this->classification;
    }

    public function setClassification(?Classification $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}

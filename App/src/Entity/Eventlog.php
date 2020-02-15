<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eventlog
 *
 * @ORM\Table(name="eventlog", indexes={@ORM\Index(name="fk_eventlog_event1_idx", columns={"event_id"})})
 * @ORM\Entity
 */
class Eventlog
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
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="repro_date", type="datetime", nullable=false)
     */
    private $reproDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_log", type="datetime", nullable=false)
     */
    private $dateLog;

    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     * })
     */
    private $event;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getReproDate(): ?\DateTimeInterface
    {
        return $this->reproDate;
    }

    public function setReproDate(\DateTimeInterface $reproDate): self
    {
        $this->reproDate = $reproDate;

        return $this;
    }

    public function getDateLog(): ?\DateTimeInterface
    {
        return $this->dateLog;
    }

    public function setDateLog(\DateTimeInterface $dateLog): self
    {
        $this->dateLog = $dateLog;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userxevent
 *
 * @ORM\Table(name="userxevent", indexes={@ORM\Index(name="fk_userxevent_event1_idx", columns={"event_id"}), @ORM\Index(name="fk_userxevent_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Userxevent
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
     * @var bool
     *
     * @ORM\Column(name="attended", type="boolean", nullable=false)
     */
    private $attended;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="check_in", type="datetime", nullable=false)
     */
    private $checkIn;

    /**
     * @var bool
     *
     * @ORM\Column(name="interest", type="boolean", nullable=false)
     */
    private $interest = '0';

    /**
     * @var Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     * })
     */
    private $event;

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

    public function getAttended(): ?bool
    {
        return $this->attended;
    }

    public function setAttended(bool $attended): self
    {
        $this->attended = $attended;

        return $this;
    }

    public function getCheckIn(): ?\DateTimeInterface
    {
        return $this->checkIn;
    }

    public function setCheckIn(\DateTimeInterface $checkIn): self
    {
        $this->checkIn = $checkIn;

        return $this;
    }

    public function getInterest(): ?bool
    {
        return $this->interest;
    }

    public function setInterest(bool $interest): self
    {
        $this->interest = $interest;

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

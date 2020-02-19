<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscription
 *
 * @ORM\Table(name="subscription", indexes={@ORM\Index(name="fk_subscription_card1_idx", columns={"card_id"}), @ORM\Index(name="fk_subscription_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Subscription
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
     * @ORM\Column(name="credit_card", type="string", length=45, nullable=false)
     */
    private $creditCard;

    /**
     * @var string
     *
     * @ORM\Column(name="due_date", type="string", length=45, nullable=false)
     */
    private $dueDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="enable", type="boolean", nullable=false)
     */
    private $enable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="card_expiration_date", type="datetime", nullable=false)
     */
    private $cardExpirationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="subscription_register", type="datetime", nullable=false)
     */
    private $subscriptionRegister;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="subcription_expiration", type="datetime", nullable=false)
     */
    private $subcriptionExpiration;

    /**
     * @var \Card
     *
     * @ORM\ManyToOne(targetEntity="Card")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="card_id", referencedColumnName="id")
     * })
     */
    private $card;

    /**
     * @var \User
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

    public function getCreditCard(): ?string
    {
        return $this->creditCard;
    }

    public function setCreditCard(string $creditCard): self
    {
        $this->creditCard = $creditCard;

        return $this;
    }

    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    public function setDueDate(string $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;

        return $this;
    }

    public function getCardExpirationDate(): ?\DateTimeInterface
    {
        return $this->cardExpirationDate;
    }

    public function setCardExpirationDate(\DateTimeInterface $cardExpirationDate): self
    {
        $this->cardExpirationDate = $cardExpirationDate;

        return $this;
    }

    public function getSubscriptionRegister(): ?\DateTimeInterface
    {
        return $this->subscriptionRegister;
    }

    public function setSubscriptionRegister(\DateTimeInterface $subscriptionRegister): self
    {
        $this->subscriptionRegister = $subscriptionRegister;

        return $this;
    }

    public function getSubcriptionExpiration(): ?\DateTimeInterface
    {
        return $this->subcriptionExpiration;
    }

    public function setSubcriptionExpiration(\DateTimeInterface $subcriptionExpiration): self
    {
        $this->subcriptionExpiration = $subcriptionExpiration;

        return $this;
    }

    public function getCard(): ?Card
    {
        return $this->card;
    }

    public function setCard(?Card $card): self
    {
        $this->card = $card;

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

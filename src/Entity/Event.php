<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{

    public const EVENT_TYPE_ARRAY = [
        0 => 'tasting',
        1 => 'catering'
    ];

    public const EVENT_KIND_ARRAY = [
        0 => 'Birthday',
        1 => 'Wedding',
        2 => 'Company party',
        3 => 'Fair',
        4 => 'Restaurant',
        5 => 'Cafeteria',
        6 => 'Other',
    ];

    public const STATE_ARRAY = [
        0 => 'Vaud',
        1 => 'Genève',
        2 => 'Neuchâtel',
        3 => 'Valais',
        4 => 'Fribourg',
        5 => 'Berne',
        6 => 'Zürich'
    ];

    public const ADVANCED_TIME_ARRAY = [
        0 => '30 minutes',
        1 => '1 heure',
        2 => '1,5 heures',
        3 => '2 heures',
        4 => '2,5 heures',
        5 => '3 heures'
    ];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column]
    private ?int $street_number = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $state = null;

    #[ORM\Column]
    private ?int $postcode = null;

    #[ORM\Column(length: 255)]
    private ?string $event_name = null;

    #[ORM\Column]
    private ?int $guests_number = null;

    #[ORM\Column]
    private ?int $advance_time = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $event_date = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?int $available_time_for_event = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $event_time = null;

    #[ORM\Column]
    private ?int $event_type = null;

    #[ORM\Column]
    private ?int $event_kind = null;

    #[ORM\Column]
    private ?bool $lactose_intolerant = null;

    #[ORM\Column]
    private ?bool $nearby_power_supply = null;

    #[ORM\Column]
    private ?bool $Short_walking_distance = null;

    public function __construct(){
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getStreetNumber(): ?int
    {
        return $this->street_number;
    }

    public function setStreetNumber(int $street_number): self
    {
        $this->street_number = $street_number;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getPostcode(): ?int
    {
        return $this->postcode;
    }

    public function setPostcode(int $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getEventName(): ?string
    {
        return $this->event_name;
    }

    public function setEventName(string $event_name): self
    {
        $this->event_name = $event_name;

        return $this;
    }

    public function getGuestsNumber(): ?int
    {
        return $this->guests_number;
    }

    public function setGuestsNumber(int $guests_number): self
    {
        $this->guests_number = $guests_number;

        return $this;
    }

    public function getAdvanceTime(): ?int
    {
        return $this->advance_time;
    }

    public function setAdvanceTime(int $advance_time): self
    {
        $this->advance_time = $advance_time;

        return $this;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->event_date;
    }

    public function setEventDate(\DateTimeInterface $event_date): self
    {
        $this->event_date = $event_date;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAvailableTimeForEvent(): ?int
    {
        return $this->available_time_for_event;
    }

    public function setAvailableTimeForEvent(int $available_time_for_event): self
    {
        $this->available_time_for_event = $available_time_for_event;

        return $this;
    }

    public function getEventTime(): ?\DateTimeInterface
    {
        return $this->event_time;
    }

    public function setEventTime(\DateTimeInterface $event_time): self
    {
        $this->event_time = $event_time;

        return $this;
    }

    public function getEventType(): ?int
    {
        return $this->event_type;
    }

    public function setEventType(int $event_type): self
    {
        $this->event_type = $event_type;

        return $this;
    }

    public function getEventKind(): ?int
    {
        return $this->event_kind;
    }

    public function setEventKind(int $event_kind): self
    {
        $this->event_kind = $event_kind;

        return $this;
    }

    public function isLactoseIntolerant(): ?bool
    {
        return $this->lactose_intolerant;
    }

    public function setLactoseIntolerant(bool $lactose_intolerant): self
    {
        $this->lactose_intolerant = $lactose_intolerant;

        return $this;
    }

    public function isNearbyPowerSupply(): ?bool
    {
        return $this->nearby_power_supply;
    }

    public function setNearbyPowerSupply(bool $nearby_power_supply): self
    {
        $this->nearby_power_supply = $nearby_power_supply;

        return $this;
    }

    public function isShortWalkingDistance(): ?bool
    {
        return $this->Short_walking_distance;
    }

    public function setShortWalkingDistance(bool $Short_walking_distance): self
    {
        $this->Short_walking_distance = $Short_walking_distance;

        return $this;
    }
}

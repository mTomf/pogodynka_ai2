<?php

namespace App\Entity;

use App\Repository\MeasurementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasurementRepository::class)]
class Measurement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'measurements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 0)]
    private ?string $temperature_c = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 0)]
    private ?string $cloudiness_pct = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 0)]
    private ?string $wind_direction_deg = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 0)]
    private ?string $pressure_hpa = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 0)]
    private ?string $humidity_pct = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 0)]
    private ?string $wind_speed_kmh = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getTemperatureC(): ?string
    {
        return $this->temperature_c;
    }

    public function setTemperatureC(string $temperature_c): static
    {
        $this->temperature_c = $temperature_c;

        return $this;
    }

    public function getCloudinessPct(): ?string
    {
        return $this->cloudiness_pct;
    }

    public function setCloudinessPct(string $cloudiness_pct): static
    {
        $this->cloudiness_pct = $cloudiness_pct;

        return $this;
    }

    public function getWindDirectionDeg(): ?string
    {
        return $this->wind_direction_deg;
    }

    public function setWindDirectionDeg(string $wind_direction_deg): static
    {
        $this->wind_direction_deg = $wind_direction_deg;

        return $this;
    }

    public function getPressureHpa(): ?string
    {
        return $this->pressure_hpa;
    }

    public function setPressureHpa(string $pressure_hpa): static
    {
        $this->pressure_hpa = $pressure_hpa;

        return $this;
    }

    public function getHumidityPct(): ?string
    {
        return $this->humidity_pct;
    }

    public function setHumidityPct(string $humidity_pct): static
    {
        $this->humidity_pct = $humidity_pct;

        return $this;
    }

    public function getWindSpeedKmh(): ?string
    {
        return $this->wind_speed_kmh;
    }

    public function setWindSpeedKmh(string $wind_speed_kmh): static
    {
        $this->wind_speed_kmh = $wind_speed_kmh;

        return $this;
    }
}

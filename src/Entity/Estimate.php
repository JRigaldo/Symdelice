<?php

namespace App\Entity;

use App\Repository\EstimateRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EstimateRepository::class)]
class Estimate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $banana = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $strawberry = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $raspberry = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $mango = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $lime = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $melon = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $ginger = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $mint = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $vanilla = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $strawberry_coulis = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $raspberry_coulis = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $mango_coulis = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $chocolate_tanzania = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $milk = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $cream = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $gruyere_cream = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $sugar = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $coconut_cream = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $organization_price_per_hour = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $time_of_purchase_products = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $time_preparation = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $time_loading = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $time_installation = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $time_storage = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $time_washing_equipment = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $time_to_tidy_the_room = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $time_for_email_exchange = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $car_rental = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $car_journey = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $material_pots = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $material_spoon = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $material_towel = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $material_disinfectant = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $material_toc = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $material_tshirt = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $material_utensil = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $amortization_of_storage = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $depreciation_of_machines = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $depreciation_of_stand = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $salary_event = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $event_number_of_iceroller = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $event_number_of_hours = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $company_costs = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $number_of_employees = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $Profit = null;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct(){
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBanana(): ?float
    {
        return $this->banana;
    }

    public function setBanana(float $banana): self
    {
        $this->banana = $banana;

        return $this;
    }

    public function getStrawberry(): ?float
    {
        return $this->strawberry;
    }

    public function setStrawberry(float $strawberry): self
    {
        $this->strawberry = $strawberry;

        return $this;
    }

    public function getRaspberry(): ?float
    {
        return $this->raspberry;
    }

    public function setRaspberry(float $raspberry): self
    {
        $this->raspberry = $raspberry;

        return $this;
    }

    public function getMango(): ?float
    {
        return $this->mango;
    }

    public function setMango(float $mango): self
    {
        $this->mango = $mango;

        return $this;
    }

    public function getLime(): ?float
    {
        return $this->lime;
    }

    public function setLime(float $lime): self
    {
        $this->lime = $lime;

        return $this;
    }

    public function getMelon(): ?float
    {
        return $this->melon;
    }

    public function setMelon(float $melon): self
    {
        $this->melon = $melon;

        return $this;
    }

    public function getGinger(): ?float
    {
        return $this->ginger;
    }

    public function setGinger(float $ginger): self
    {
        $this->ginger = $ginger;

        return $this;
    }

    public function getMint(): ?float
    {
        return $this->mint;
    }

    public function setMint(float $mint): self
    {
        $this->mint = $mint;

        return $this;
    }

    public function getVanilla(): ?float
    {
        return $this->vanilla;
    }

    public function setVanilla(float $vanilla): self
    {
        $this->vanilla = $vanilla;

        return $this;
    }

    public function getStrawberryCoulis(): ?float
    {
        return $this->strawberry_coulis;
    }

    public function setStrawberryCoulis(float $strawberry_coulis): self
    {
        $this->strawberry_coulis = $strawberry_coulis;

        return $this;
    }

    public function getRaspberryCoulis(): ?float
    {
        return $this->raspberry_coulis;
    }

    public function setRaspberryCoulis(float $raspberry_coulis): self
    {
        $this->raspberry_coulis = $raspberry_coulis;

        return $this;
    }

    public function getMangoCoulis(): ?float
    {
        return $this->mango_coulis;
    }

    public function setMangoCoulis(float $mango_coulis): self
    {
        $this->mango_coulis = $mango_coulis;

        return $this;
    }

    public function getChocolateTanzania(): ?float
    {
        return $this->chocolate_tanzania;
    }

    public function setChocolateTanzania(float $chocolate_tanzania): self
    {
        $this->chocolate_tanzania = $chocolate_tanzania;

        return $this;
    }

    public function getMilk(): ?float
    {
        return $this->milk;
    }

    public function setMilk(float $milk): self
    {
        $this->milk = $milk;

        return $this;
    }

    public function getCream(): ?float
    {
        return $this->cream;
    }

    public function setCream(float $cream): self
    {
        $this->cream = $cream;

        return $this;
    }

    public function getGruyereCream(): ?float
    {
        return $this->gruyere_cream;
    }

    public function setGruyereCream(float $gruyere_cream): self
    {
        $this->gruyere_cream = $gruyere_cream;

        return $this;
    }

    public function getSugar(): ?float
    {
        return $this->sugar;
    }

    public function setSugar(float $sugar): self
    {
        $this->sugar = $sugar;

        return $this;
    }

    public function getCoconutCream(): ?float
    {
        return $this->coconut_cream;
    }

    public function setCoconutCream(float $coconut_cream): self
    {
        $this->coconut_cream = $coconut_cream;

        return $this;
    }

    public function getOrganizationPricePerHour(): ?float
    {
        return $this->organization_price_per_hour;
    }

    public function setOrganizationPricePerHour(float $organization_price_per_hour): self
    {
        $this->organization_price_per_hour = $organization_price_per_hour;

        return $this;
    }

    public function getTimeOfPurchaseProducts(): ?float
    {
        return $this->time_of_purchase_products;
    }

    public function setTimeOfPurchaseProducts(float $time_of_purchase_products): self
    {
        $this->time_of_purchase_products = $time_of_purchase_products;

        return $this;
    }

    public function getTimePreparation(): ?float
    {
        return $this->time_preparation;
    }

    public function setTimePreparation(float $time_preparation): self
    {
        $this->time_preparation = $time_preparation;

        return $this;
    }

    public function getTimeLoading(): ?float
    {
        return $this->time_loading;
    }

    public function setTimeLoading(float $time_loading): self
    {
        $this->time_loading = $time_loading;

        return $this;
    }

    public function getTimeInstallation(): ?float
    {
        return $this->time_installation;
    }

    public function setTimeInstallation(float $time_installation): self
    {
        $this->time_installation = $time_installation;

        return $this;
    }

    public function getTimeStorage(): ?float
    {
        return $this->time_storage;
    }

    public function setTimeStorage(float $time_storage): self
    {
        $this->time_storage = $time_storage;

        return $this;
    }

    public function getTimeWashingEquipment(): ?float
    {
        return $this->time_washing_equipment;
    }

    public function setTimeWashingEquipment(float $time_washing_equipment): self
    {
        $this->time_washing_equipment = $time_washing_equipment;

        return $this;
    }

    public function getTimeToTidyTheRoom(): ?float
    {
        return $this->time_to_tidy_the_room;
    }

    public function setTimeToTidyTheRoom(float $time_to_tidy_the_room): self
    {
        $this->time_to_tidy_the_room = $time_to_tidy_the_room;

        return $this;
    }

    public function getTimeForEmailExchange(): ?float
    {
        return $this->time_for_email_exchange;
    }

    public function setTimeForEmailExchange(float $time_for_email_exchange): self
    {
        $this->time_for_email_exchange = $time_for_email_exchange;

        return $this;
    }

    public function getCarRental(): ?float
    {
        return $this->car_rental;
    }

    public function setCarRental(float $car_rental): self
    {
        $this->car_rental = $car_rental;

        return $this;
    }

    public function getCarJourney(): ?float
    {
        return $this->car_journey;
    }

    public function setCarJourney(float $car_journey): self
    {
        $this->car_journey = $car_journey;

        return $this;
    }

    public function getMaterialPots(): ?float
    {
        return $this->material_pots;
    }

    public function setMaterialPots(float $material_pots): self
    {
        $this->material_pots = $material_pots;

        return $this;
    }

    public function getMaterialSpoon(): ?float
    {
        return $this->material_spoon;
    }

    public function setMaterialSpoon(float $material_spoon): self
    {
        $this->material_spoon = $material_spoon;

        return $this;
    }

    public function getMaterialTowel(): ?float
    {
        return $this->material_towel;
    }

    public function setMaterialTowel(float $material_towel): self
    {
        $this->material_towel = $material_towel;

        return $this;
    }

    public function getMaterialDisinfectant(): ?float
    {
        return $this->material_disinfectant;
    }

    public function setMaterialDisinfectant(float $material_disinfectant): self
    {
        $this->material_disinfectant = $material_disinfectant;

        return $this;
    }

    public function getMaterialToc(): ?float
    {
        return $this->material_toc;
    }

    public function setMaterialToc(float $material_toc): self
    {
        $this->material_toc = $material_toc;

        return $this;
    }

    public function getMaterialTshirt(): ?float
    {
        return $this->material_tshirt;
    }

    public function setMaterialTshirt(float $material_tshirt): self
    {
        $this->material_tshirt = $material_tshirt;

        return $this;
    }

    public function getMaterialUtensil(): ?float
    {
        return $this->material_utensil;
    }

    public function setMaterialUtensil(float $material_utensil): self
    {
        $this->material_utensil = $material_utensil;

        return $this;
    }

    public function getAmortizationOfStorage(): ?float
    {
        return $this->amortization_of_storage;
    }

    public function setAmortizationOfStorage(float $amortization_of_storage): self
    {
        $this->amortization_of_storage = $amortization_of_storage;

        return $this;
    }

    public function getDepreciationOfMachines(): ?float
    {
        return $this->depreciation_of_machines;
    }

    public function setDepreciationOfMachines(float $depreciation_of_machines): self
    {
        $this->depreciation_of_machines = $depreciation_of_machines;

        return $this;
    }

    public function getDepreciationOfStand(): ?float
    {
        return $this->depreciation_of_stand;
    }

    public function setDepreciationOfStand(float $depreciation_of_stand): self
    {
        $this->depreciation_of_stand = $depreciation_of_stand;

        return $this;
    }

    public function getSalaryEvent(): ?float
    {
        return $this->salary_event;
    }

    public function setSalaryEvent(float $salary_event): self
    {
        $this->salary_event = $salary_event;

        return $this;
    }

    public function getEventNumberOfIceroller(): ?float
    {
        return $this->event_number_of_iceroller;
    }

    public function setEventNumberOfIceroller(float $event_number_of_iceroller): self
    {
        $this->event_number_of_iceroller = $event_number_of_iceroller;

        return $this;
    }

    public function getEventNumberOfHours(): ?float
    {
        return $this->event_number_of_hours;
    }

    public function setEventNumberOfHours(float $event_number_of_hours): self
    {
        $this->event_number_of_hours = $event_number_of_hours;

        return $this;
    }

    public function getCompanyCosts(): ?float
    {
        return $this->company_costs;
    }

    public function setCompanyCosts(float $company_costs): self
    {
        $this->company_costs = $company_costs;

        return $this;
    }

    public function getNumberOfEmployees(): ?float
    {
        return $this->number_of_employees;
    }

    public function setNumberOfEmployees(float $number_of_employees): self
    {
        $this->number_of_employees = $number_of_employees;

        return $this;
    }

    public function getProfit(): ?float
    {
        return $this->Profit;
    }

    public function setProfit(float $Profit): self
    {
        $this->Profit = $Profit;

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
}

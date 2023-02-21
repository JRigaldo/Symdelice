CREATE TABLE flavor (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR (150),
    price FLOAT,
    stock BOOLEAN,
    topping BOOLEAN,
    created_at DATETIME);

    INSERT INTO flavor (
        name, price, stock, topping, created_at
    ) VALUES ("Vanille", 2, true, false, "2022-09-28 13:03:02"),
             ("Melon menthe", 2, true, false, "2022-09-28 13:03:02"),
             ("Mangue", 2, true, false, "2022-09-28 13:03:02"),
             ("Lime gingembre", 2, true, false, "2022-09-28 13:03:02"),
             ("Framboise", 2, true, false, "2022-09-28 13:03:02"),
             ("Fraise", 2, true, false, "2022-09-28 13:03:02"),
             ("Chocolat", 2, true, false, "2022-09-28 13:03:02"),
             ("Banana split", 2, true, false, "2022-09-28 13:03:02"),
             ("Pistache", 2, true, false, "2022-09-28 13:03:02"),
             ("Myrtille", 2, true, false, "2022-09-28 13:03:02"),
             ("Mure", 2, true, false, "2022-09-28 13:03:02"),
             ("Creme chantille", 2, true, true, "2022-09-28 13:03:02"),
             ("Garnitures", 2, true, true, "2022-09-28 13:03:02"),
             ("Bricelet maison", 2, true, true, "2022-09-28 13:03:02");

INSERT INTO estimate (
    banana,
    strawberry,
    raspberry,
    mango,
    lime,
    melon,
    ginger,
    mint,
    vanilla,
    strawberry_coulis,
    raspberry_coulis,
    mango_coulis,
    chocolate_tanzania,
    milk,
    cream,
    gruyere_cream,
    sugar,
    coconut_cream,
    organization_price_per_hour,
    time_of_purchase_products,
    time_preparation,
    time_loading,
    time_installation,
    time_storage,
    time_washing_equipment,
    time_to_tidy_the_room,
    time_for_email_exchange,
    car_rental,
    car_journey,
    material_pots,
    material_spoon,
    material_towel,
    material_disinfectant,
    material_toc,
    material_tshirt,
    material_utensil,
    amortization_of_storage,
    depreciation_of_machines,
    depreciation_of_stand,
    salary_event,
    event_number_of_iceroller,
    event_number_of_hours,
    company_costs,
    number_of_employees,
    Profit
) VALUES (
    5
    12
    12
    12
    10
    8
    2.5
    2.5
    10
    14
    14
    14
    30
    2
    7
    18
    1
    14
    30
    1
    3
    1
    0.5
    0.5
    1
    1
    1
    100
    60
    18
    3.5
    5
    13
    2
    5
    10
    10
    50
    10
    80
    2
    3
    10
    2
    100
);

UPDATE estimate SET (banana = NULL) WHERE (banana = 5);
INSERT INTO estimate (banana) VALUES (5);

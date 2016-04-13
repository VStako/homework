<?php
define('GENDER_MALE', 'male');
define('GENDER_FEMALE', 'female');

// Классификация машин
define('CAR_CLASS_SEDAN', 'sedan');

// --------------------------------------

// Список гендерной принадлежности
$genders = [
    GENDER_MALE,
    GENDER_FEMALE
];

// Список классов машин
$classes_cars = [
    CAR_CLASS_SEDAN,
];



// Пользователи
$users = [
    [
        // ID пользователя
        'id' => 1,
        'first_name' => 'Валентин',
        'last_name' => 'Радужный',
        'second_name' => 'Игоревич',
        'login' => 'valentin',
        'password' => '78vrE0871',
        'gender' => GENDER_MALE,
        'addition_info' => null,
        'birthday' => '14.05.1990',
    ],
    [
        'id' => 2,
        'first_name' => 'Олег',
        'last_name' => 'Мозговой',
        'second_name' => 'Дмитриевич',
        'login' => 'oleg',
        'password' => 'A87s08w7',
        'gender' => GENDER_MALE,
        'addition_info' => 'Машины - моя стихия',
        'birthday' => '10.07.1991',
    ],
    [
        'id' => 3,
        'first_name' => 'Виктория',
        'last_name' => 'Рыбкина',
        'second_name' => 'Александровна',
        'login' => 'prosto_vika',
        'password' => '9Wd803d',
        'gender' => GENDER_FEMALE,
        'addition_info' => 'Я феминистка',
        'birthday' => '23.07.1989',
    ],
];

// Машины
$cars = [
    [
        // ID машины
        'id' => 1,
        'name' => 'Alfa Romeo MiTo',
        'company' => 'Alfa Romeo',
        'city_id' => 1,
        'class' => CAR_CLASS_SEDAN,
    ],
    [
        'id' => 2,
        'name' => 'Ford Mustang',
        'company' => 'Ford',
        'city_id' => 2,
        'class' => CAR_CLASS_SEDAN,
    ],
];

// Принадлежание машин пользователям
$users_cars = [
    [
        // ID записи: <пользователь-машина>
        'id' => 1,
        'user_id' => 2,
        'car_id' => 1
    ],
    [
        'id' => 2,
        'user_id' => 3,
        'car_id' => 1
    ],
    [
        'id' => 3,
        'user_id' => 3,
        'car_id' => 2
    ],
    // И да, у феминистки 2 машины - это не ошибка
];


// Страны
$countries = [
    [
        // ID страны
        'id' => 1,
        'name' => 'Italia'
    ],
    [
        'id' => 2,
        'name' => 'USA'
    ],
    [
        'id' => 3,
        'name' => 'Michigan'
    ]
];

// Массив городов
$cities = [
    [
        // ID города
        'id' => 1,
        'name' => 'Milano',
        // ID Страны
        'country_id' => 1
    ],
    [
        'id' => 2,
        'name' => 'Flat Rock',
        'country_id' => 3
    ]
];



function get_city($id){
    foreach($this -> $cities as $key => $value){
        if($key == 'id' && $value == $id){
            return ;
        }
    }
}



function get_cities_country1($country_id) {
    global $cities;

    for ($i = 0; $i < count($cities); $i++) {
        $all_cities = $cities[$i];
        if ($all_cities['country_id'] == $country_id) {
            $all_cities = $all_cities['name'];
            return $all_cities;
        }
    }
    return null;
}

function get_cities_country2($country_id) {
    global $cities;
    $list = array();

    for ($i = 0; $i < count($cities); $i++) {
        $all_cities = $cities[$i];
        if ($all_cities['country_id'] == $country_id) {
            $list = $all_cities['name'];
        }
    }
    return $list;
}

function get_countries($city_id) {
    global $countries;
    global $cities;
    $country_id = 0;

    for ($i = 0; $i < count($cities); $i++) {
        $city = $countries[$i];
        if ($city['country_id'] == $city_id) {
            $country_id = $city['country_id'];
        }
    }

    for ($i = 0; $i < count($countries); $i++) {
        $country = $countries[$i];
        if ($country['country_id'] == $country_id) {
            return $country['name'];
        }
    }
    return null;
}
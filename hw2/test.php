<?php
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
    ],
    [
        // ID города
        'id' => 3,
        'name' => 'Kiev',
        // ID Страны
        'country_id' => 1
    ],
    [
        'id' => 4,
        'name' => 'Kherson',
        'country_id' => 3
    ]
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

//// p2
//function get_country_city($city_id) {
//    global $cities;
//    global $countries;
//    $country_id = 0;
//
//    for ($i = 0; $i < count($cities); $i++) {
//        $city = $cities[$i];
//        if ($city['id'] == $city_id) {
//            $country_id = $city['country_id'];
//        }
//    }
//    for ($i = 0; $i < count($countries); $i++) {
//        $country = $countries[$i];
//        if ($country_id == $country['id']) {
//            $country = $country['name'];
//            return $country;
//        }
//    }
//    return null;
//}
//echo (get_country_city(3));
//
//// p3
//function get_cities_country($country_id)
//{
//    global $cities;
//    $list = array();
//
//    for ($i = 0; $i < count($cities); $i++) {
//        $city = $cities[$i];
//        if ($city['country_id'] == $country_id) {
//            $list[] = $city['name'];
//        }
//    }
//    return $list;
//}
//print_r (get_cities_country(1));
//
//
//// p4
//function get_city($city_id)
//{
//    global $cities;
//
//    for ($i = 0; $i < count($cities); $i++) {
//        $city = $cities[$i];
//        if ($city['id'] == $city_id) {
//            return $city['name'];
//        }
//    }
//}
//echo get_city(4)."\n";
//
////p6
//function create_user_full_name($first_name, $last_name, $second_name){
//return $first_name." ".$last_name." ".$second_name;
//}
//
////p7
//function get_user_full_name($user_id){
//    global $users;
//
//    for ($i = 0; $i < count($users); $i++) {
//        $user = $users[$i];
//        if ($user['id'] == $user_id) {
//            return create_user_full_name($user['first_name'], $user['last_name'], $user['second_name']);
//        }
//    }
//}
//echo get_user_full_name(3)."\n";
//
////p8
//function get_car($car_id){
//    global $cars;
//
//    for ($i = 0; $i < count($cars); $i++) {
//        $car = $cars[$i];
//        if ($car['id'] == $car_id) {
//            return $car['name'];
//        }
//    }
//}
//
//echo get_car(2)."\n";
//
////p9
//function get_users($ids){
//    global $users;
//    $my_users = array();
//
//    for ($i = 0; $i < count($users); $i++) {
//        $user = $users[$i];
//        for ($j = 0; $j < count($ids); $j++){
//            if ($ids[$j] === $user['id']) {
//                $my_users[] = $user;
//            }
//        }
//    }
//    return $my_users;
//}
//print_r(get_users(array(0, 2)));

////p10
//function search_user($options){
//    global $users;
//    for ($i = 0; $i < count($users); $i++) {
//        $user = $users[$i];
//        if ($user['id'] === $options['id'] && strpos($user['first_name'], $options['first_name']) == true) {
//            return $user;
//        }
//    }
//    return null;
//}
//$opt = array(
//    "id" => 3,
//    "first_name" => "тор"
//);
//
//print_r(search_user($opt));

////p23
//function sum_of_numbers($numb){
//    $str = (string)$numb;
//    $sum = 0;
//    for ($i = 0; $i < mb_strlen($str); $i++){
//        $sum = $sum + (int)$str[$i];
//    }
//    return $sum;
//}
//
//echo sum_of_numbers(12345678910);

////p23
//function number_of_enter($numb, $numbers){
//    echo $numbers."\n";
//    $str = (string)$numbers;
//    echo $str."\n";
//    $count = 0;
//    for ($i = 0; $i < mb_strlen($str); $i++){
//        echo "$str[$i] == $numb"."\n";
//        if($numb == $str[$i] ){
//            $count++;
//        }
//    }
//    return $count;
//}
//
//echo number_of_enter(5, 442158755745);

function search_user($options){
    global $users;
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        $k = strpos($user['first_name'], $options['first_name']);
        echo "k = $k"."\n";
        if ($user['id'] === $options['id'] && strpos($user['first_name'], $options['first_name']) == true) {
            return $user;
        }
    }
    return null;
}
$opt = array(
    "id" => 3,
    "first_name" => "Вик"
);

print_r(search_user($opt));

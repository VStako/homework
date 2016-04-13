<?php
//$name="Inokentiy";
//$age = "ed";
//$day = 4;
//
//echo "My name is $name";
//echo "My age is $age";
////echo (boolean)(gettype($age) != "integer");
//if ($age>=18 & $age<=59){
//    echo "You have to work and work...";
//} elseif($age>59) {
//    echo "You must be retired!";
//} elseif($age<0 || gettype($age) != "integer") {
//    echo "Unknown age!";
//} elseif($age >= 0 & $age <= 17) {
//    echo "You are too young!";
//}
//
//switch($day)
//{
//    case 1: case 2: case 3:case 4:case 5:
//    echo ("Это рабочий день.");
//    break;
//    case 6: case 7:
//    echo ("Этот день выходной.");
//    break;
//    default:
//        echo ("This is not a day!");
//}
//
//$s = 2000;
//$t = 8;
//echo "speed = ".$s/$t;
//
//$a = 5;
//$b = 10;
//echo max($a, $b);
//
//$aa = 7;
//$bb = "7";
//if ($aa == $bb){
//    echo var_dump($aa);
//    echo var_dump($bb);
//} else {
//    echo "not equals";
//}

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


//function get_users($ids) {
//    global $users;
//    $list = array();
//
//    foreach ($ids as $id) {
//        $k=true;
//        for ($i = 0; $i < count($users); $i++) {
//            $user = $users[$i];
//            if ($user['id'] == $id) {
//                $list[] = $user;
//                $k=false;
//            }
//        }
//        if ($k) {
//            echo "I don't have user with id $id" . "\n";
//        }
//    }
//    return $list;
//}

//function get_users($ids) {
//    global $users;
//    $list = array();
//    $k=0;
//
//    foreach ($ids as $id) {
//        for ($i = 0; $i < count($users); $i++) {
//            $user = $users[$i];
//            if ($user['id'] == $id) {
//                $list[] = $user;
//                $k=$user['id'];
//        }
//        }
//        if ($k != $id) {
//            echo "ID $id not found"."\n";
//        }
//    }
//    return $list;
//}
//print_r(get_users(array(1,10,2,5,7)));

//10. `search_user(options)` - Поиск пользователя по параметрам, где `options` - массив, где ключ в массиве это параметр,
//по которому можно найти пользователя, а значение используется для строгого сравнения, если тип данных равен: `integer`,
//`float`, а также частичное сравнение, если поиск происходит по имени пользователя или текстовым значениям, то есть `string`.
//Массив `options` может быть таким:
$opt = array(
    "id" => 2,
    "first_name" => "лег"
);
//Все параметры указанные в `options` должны использоваться вместе, то есть `and`, а не `or`.
//Например, мы сможем найти пользователя по данным параметрам, потому то у пользователя "Валентин" ID = 1,
//но не сможем найти, если изменим ID на 2, или строку имени на "Виктория", потому что у нее совершенно другой ID.

function search_user($options){
    global $users;
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        if ($user['id'] === $options['id'] & get_name($user['first_name'], $options['Вале']) != null) {
            return $user;
        }
    }
    return null;
}

print_r(search_user($opt));


function get_name($string, $str){
    for ($i=0; $i<count($string)-count($str); $i++){
        if (substr($string, $i, count($str)) == $str){
            return $string;
        }
    }
    return null;
}

//11. `change_user_pasword(user_id, old_password, new_password)` - Функция для смена пароля пользователя.
// Успешная смена пароля произойдет только в том случае, если старый пароль был введен верно, иначе генерируем ошибку.
//12. `get_cars_user(user_id)` - Вывод списка машин пользователя. Если машин у пользователя нет, то функция должна вернуть `null`.
//13. `get_users_car(car_id)` - По ID машины вывести всех пользователей, которые приобрели данную машину.

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

//function get_cars_user($user_id){
//    global $users_cars;
//    global $cars;
//
//    $cars_list = array();
//
//    for ($i = 0; $i < count($users_cars); $i++) {
//        $user_car = $users_cars[$i];
//        if ($user_car['user_id'] == $user_id) {
//            for ($j = 0; $j < count($cars); $j++){
//                $car = $cars[$j];
//                if ($car['id'] == $user_car['car_id']){
//                    array_push($cars_list, $car);
//                }
//            }
//        }
//    }
//    return $cars_list;
//}
//
//print_r(get_cars_user(1));
//
//
//function if_null(){
//    if(get_cars_user(7) == null){
//        echo "NULL";
//    }
//}
//
//if_null();
//
//function get_cars_user($user_id) {
//    global $users_cars;
//    global $cars;
//    $car_list = array();
//
//    for ($i = 0; $i < count($users_cars); $i++) {
//        $user = $users_cars[$i];
//        if ($user['user_id'] == $user_id) {
//            for ($j = 0; $j < count($cars); $j++) {
//                $car = $cars[$j];
//                if ($user['car_id'] == $car['id']) {
////                    echo $car['id']." car['id']     ".$user['car_id']." user['car_id']";
//                    $car_list = $car['name'];
//                }
//            }
//        }
//    }
//    return $car_list;
//}

//print_r(get_cars_user(3));


//function get_users_car($car_id) {
//    global $users_cars;
//    global $cars;
//    global $users;
//    $user_list = array();
//
//    for ($i = 0; $i < count($users_cars); $i++) {
//        $user_c = $users_cars[$i];
//        if ($user_c['car_id'] == $car_id) {
//            for ($j = 0; $j < count($users); $j++) {
//                $user = $users[$j];
//                if ($user_c['user_id'] == $user['id']) {
////                    echo $user_c['user_id']." user_c['user_id']     ".$user['id']." user['id']";
//                    $user_list[] = $user['first_name'];
//                }
//            }
//        }
//    }
//    return $user_list;
//}

//function get_users_car($car_id) {
//    global $users_cars;
//    global $users;
//    $users_list = null;
//
//    for ($i = 0; $i < count($users_cars); $i++) {
//        $car = $users_cars[$i];
//        if ($car['car_id'] == $car_id) {
//            for ($k = 0; $k < count($users); $k++) {
//                $user = $users[$k];
//                if ($car['user_id'] == $user['id']) {
//                    $users_list[] = $user;
//                }
//            }
//        } }
//    return $users_list;
//}
//
//print_r(get_users_car(1));
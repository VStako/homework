<?php
require_once 'config.php';
require_once 'exceptions.php';
require_once 'db_utils.php';

function render_template($name, $data){
    ob_start();
    include 'tamplates/'.$name.'.php';
    return ob_get_clean();
}

$config = get_config();
$db_config = $config['db'];

if( !($db_connect = mysqli_connect(
    $db_config['host'],
    $db_config['user'],
    $db_config['password'],
    $db_config['db_name']
)) === false){
    try {
        throw new DbConnectionError();
    } catch (DbConnectionError $ex) {
        echo '!!!';
    }
}

function get_users($limit=10){
    global $db_connect;
    return db_fetch_data($db_connect, 'SELECT social_id FROM social_nets LIMIT ?', [$limit]);
}

$users = get_users(5);

echo call_user_func(function() use ($users) {
    return render_template('main', [
        'users' => $users
    ]);
});

mysqli_close($db_connect);


//02.28.40

<?php
/**
 * Извление данных по запросу из БД
 * @param $db_connect: Текущее подключение к БД
 * @param string $query: Запрос
 * @param array $params: Параметры к запросу
 * @return array
 * @throws Exception
 */
function db_fetch_data(
    $db_connect, $query, array $params = []
) {
    $result_data = [];
    if (($stmt = mysqli_prepare(
            $db_connect,
            $query
        )) === false
    ) {
        throw new Exception('Error SQL prepare');
    }
    $binds_params = array(
        $stmt,
        # Распаковка типов данных параметров,
        # которые мы хотим привязать к SQL запросу
        implode('', array_keys($params))
    );

    # Документация по возможным параметрам:
    # http://php.net/manual/en/mysqli-stmt.bind-param.php
    foreach ($params as &$p) {
        $binds_params[] = &$p;
    }
    # Вызов функции `mysqli_stmt_bind_param` с
    # помощью функции `call_user_func_array` нужен для
    # того, что мы могли передать в функцию `mysqli_stmt_bind_param`
    # параметры в виде массиве, которые потом будут
    # переданы в нее последовательно, то есть, если так:
    # mysqli_stmt_bind_param($binds_params), то это совершенно не то,
    # потому как в данном случае это уже не набор
    # последовательных параметров, а массив,
    # в виде одного параметра
    call_user_func_array(
        'mysqli_stmt_bind_param',
        # Передача в функцию параметров, которые
        # мы хотим привязать к SQL запросу
        $binds_params
    );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_fetch($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $result_data[] = $row;
    }
    mysqli_stmt_free_result($stmt);

    return $result_data;
}
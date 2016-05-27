<?php

/**
 * Класс ошибки при подключении к БД
 * Class DbConnectionError
 */
class DbConnectionError extends Exception {
    public function __toString(){
        return 'Error connection to Db. '.mysqli_connect_error();
    }
}
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbConnect
 *
 * @author rodnoy
 */
class dbConnect {

    public static function getConnection() {
        
        $params = include_once ROOT.'/config/db_params.php';
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        
        return $db;
    }
}

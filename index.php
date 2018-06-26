<?php
/**
 * Created by PhpStorm.
 * User: filipe
 * Date: 26/06/18
 * Time: 05:59
 */

require_once "vendor/autoload.php";

use Lib\Model\DB;

$db = DB::access();

$results = $db->query("SELECT * FROM `livro`");

foreach ($results as $result) 
{
    foreach ($result as $value) {
        echo $value . "<br>";
    }
}
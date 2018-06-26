<?php
/**
 * Created by PhpStorm.
 * User: filipe
 * Date: 26/06/18
 * Time: 06:30
 */

interface CreaterInterface
{
    public static function select();
    public static function insert();
    public static function update();
    public static function delete();
}
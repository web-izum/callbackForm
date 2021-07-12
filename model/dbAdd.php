<?php
include_once('model/db.php');

function dbAdd(array $fields) : bool{
    $sql = "INSERT emails (name, email, country, phone, company, site, msg) VALUES (:name, :email, :country, :phone, :company, :site, :msg)";
    dbQuery($sql, $fields);
    return true;
}
<?php

namespace framework\class_interface;

interface Interface_RegisterModel{
    public function getAllUsers();                                          //returns array of all users
    public function createUser($username, $email, $password);               //adds new registration record to database
}
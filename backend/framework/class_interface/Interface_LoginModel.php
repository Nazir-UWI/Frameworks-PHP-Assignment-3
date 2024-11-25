<?php

namespace framework\class_interface;

interface Interface_LoginModel{
    public function getAllUsers();                                  //returns array of all users
    public function getLogin($email);                               //determines if login matches database records
    public function getRole($id);                                   //returns the role of user
}
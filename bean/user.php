<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PHPMailer\PHPMailer\PHPMailer;

class user {

    public $userName;
    public $userEmail;
    public $userSubject;
    public $userMessage;

    function __construct($userName, $userEmail) {
        $this->userName = $userName;
        $this->userEmail = $userEmail;
    }

}

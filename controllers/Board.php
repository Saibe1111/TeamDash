<?php

/**
* author: TeamDash
* description: controller for the Board
* see: ../util/Controller.php
**/

namespace Controllers;

class Board extends \Controller {

    public function home() {

        $this->render('home');

    }

    public function getFolder() {
        return;
    }
    
}
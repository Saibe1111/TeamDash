<?php

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|svg)$/', $_SERVER["REQUEST_URI"])) {  
   return false;
}

require_once('./bootstrap.php');

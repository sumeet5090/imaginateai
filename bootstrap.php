<?php

include_once 'constants.php';
include_once 'errors.php';
include_once 'functions.php';

if ((int) $_GET['api'] === 1) {    
    include_once('api.php');
} else {
    include_once('views.php');
}

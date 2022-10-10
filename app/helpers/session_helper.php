<?php


    session_start();

    function isloggedin() {

        if (isset($_SESSION['role'])) {
            return true;
        }   else {
            return false;
        }

    };


    function isAdmin() {

        if ( ($_SESSION['role']) == 1) {
            return true;
        }   else {
            return false;
        }

    };

    function isSubAdmin() {

        if ( ($_SESSION['role']) == 2) {
            return true;
        }   else {
            return false;
        }

    };

    function isStudent() {

        if ( ($_SESSION['role']) == 3) {
            return true;
        }   else {
            return false;
        }

    };
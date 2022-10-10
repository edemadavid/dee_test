<?php

    interface AdminInterface {
        function index();
        function registerSubAdmin();
        function sendNotification();
        function sendMail();

    }
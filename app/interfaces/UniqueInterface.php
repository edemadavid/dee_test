<?php

    interface UniqueInterface {

        function index();
        function create();
        function add();
        function show($id);
        function update($id);
        function softDelete();
        function delete($id);
        
    }
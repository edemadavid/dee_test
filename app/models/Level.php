<?php
    class Level {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }




        public function getLevels() {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `levels`');  
            
            $result = $this->db->resultSet();

            return $result;
        
        }

        public function getEachlevels($levelid) {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `levels` where id = :id');  
            
            $result = $this->db->resultSet();

            $this->db->bind(':id', $levelid);

            $result = $this->db->single();

            return $result;
        
        }


    }
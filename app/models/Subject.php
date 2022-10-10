<?php
    class Subject {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }


        public function create ($data) {

            $this->db->query('INSERT INTO subjects(name) Values (:subjectTitle)');


            $this->db->bind(':subjectTitle', $data['subjectTitle']);

            
            //Execute the function
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
           
            
        }

        public function checkSubjectExist ($subjectTitle) {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `subjects`  WHERE  `name` = :subjectTitle');  

            //binding the prepared params
            $this->db->bind(':subjectTitle', $subjectTitle);
            
            // $this->db->bind(':username', $username);
            if($this->db->rowCount() > 0){
                return $this->statement->rowCount();
            }
        

        }

        public function getSubjects() {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `subjects`');  
            
            $result = $this->db->resultSet();

            return $result;
        
        }

        public function getEachSubjects($id) {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `subjects` WHERE  `id` = :id');  

            //binding the prepared params
            $this->db->bind(':id', $id);
            
            $result = $this->db->single();

            return $result;
        
        }

        
        public function getOneSubject($id) {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `subjects`  WHERE  `id` = :id');  

            //binding the prepared params
            $this->db->bind(':id', $id);

            $result = $this->db->single();

            return $result;
        
        }


        public function countSubjects () {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `subjects`');  

            $result = $this->db->resultSet();
            
            $result = $this->db->rowCount();

            return $result;
                    

        }


        
        public function update($data) 
        {
            $this->db->query('UPDATE subjects SET name=:name WHERE id = :id');


            //Binding our Statements
            $this->db->bind(':name', $data['subjectTitle']);
            $this->db->bind(':id', $data['id']);
          
            //Execute the function
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }


        public function deleteSubject($id) {
            $this->db->query('DELETE FROM subjects WHERE id = :id');
    
            $this->db->bind(':id', $id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }





        
    }

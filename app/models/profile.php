<?php
    class Profile {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }




        public function getEachProfile($userid) {

            //this is a prepared statment
            $this->db->query('SELECT * FROM `profiles` WHERE user_id = :userid');  
            
            //binding the prepared params
            $this->db->bind(':userid', $userid);

            $result = $this->db->single();

            return $result;
        
        }

        public function create($data) 
        {
            $this->db->query('INSERT INTO profiles(full_name, tel, address, photo, user_id) VALUES (:fullname, :phoneNo, :address, :photo, :userid) ');

            //Binding our Statements
            $this->db->bind(':fullname', $data['fullname']);
            $this->db->bind(':phoneNo', $data['phoneNo']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':photo', $data['photo']);
            $this->db->bind(':userid', $data['userid']);
            
            //Execute the function
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function update($data) 
        {
            $this->db->query('UPDATE profiles SET full_name=:fullname, tel = :phoneNo, address = :address, photo = :photo WHERE user_id = :userid ');

            //Binding our Statements
            $this->db->bind(':fullname', $data['fullname']);
            $this->db->bind(':phoneNo', $data['phoneNo']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':photo', $data['photo']);
            $this->db->bind(':userid', $data['userid']);
            
            //Execute the function
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }


        


    }
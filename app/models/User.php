<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //this model is for all user login
        public function login ($username, $password) {

            $this->db->query('SELECT * FROM users where users_name = :username');

            $this->db->bind (':username', $username);
            
            $row = $this->db->single();

            if (empty($row)){
               return false;
            }

            $hashedPassword = $row->user_pwd;

            if (password_verify( $password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
            
        }

        //this model is for Students/User to register 
        public function register ($data) {
            $this->db->query('INSERT INTO users(users_name, user_email, user_pwd) Values (:username, :email, :password)');


            //Binding our Statements
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['hashedpassword']);

            
            //Execute the function
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //this model is used by the admin to register a subAdmin
        public function registerSubAdmin ($data) {
            $this->db->query('INSERT INTO users(users_name, user_email, user_pwd, role_id) Values (:username, :email, :password, :userrole)');


            //Binding our Statements
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['hashedpassword']);
            $this->db->bind(':userrole', $data['userrole']);


            
            //Execute the function
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //this model is used by the admin to Update a subAdmin 
        public function updateUser($data) {
            $this->db->query('UPDATE users SET users_name = :username, user_email = :email, user_pwd = :password WHERE user_id = :id');
    
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteUser($id) {
            $this->db->query('DELETE FROM users WHERE user_id = :id');
    
            $this->db->bind(':id', $id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }



        public function findUserByEmail($email) {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `users`  WHERE  `user_email` = :email');  
            
            //binding the prepared params
            $this->db->bind(':email', $email);
            
            $this->db->execute();
            
            if ($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }


        public function findUserByUsername($username) {
            //this is a prepared statment
            $this->db->query('SELECT * FROM users WHERE users_name = :username');  
            
            //binding the prepared params
            $this->db->bind(':username', $username);
            
            $this->db->execute();
            
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
        


        

        //this model is used by the edit/update funtion to get an id
        public function findUserById($id) {
            $this->db->query('SELECT * FROM `users` WHERE `user_id` = :id');
    
            $this->db->bind(':id', $id);
    
            $row = $this->db->single();
    
            return $row;
        }


        public function getAnyUser($userid) {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `users`WHERE user_id = :userid');  
            
            //binding the prepared params
            $this->db->bind(':userid', $userid);

            $result = $this->db->single();

            return $result;
        
        }



        //SuperAdmins

        public function getSuperAdmin() {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `users` WHERE `role_id` = 1');  
            
            $result = $this->db->resultSet();

            return $result;
        
        }



        //Teachers 

        public function getTeachers() {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `users` WHERE `role_id` = 2');  
            
            $result = $this->db->resultSet();

            return $result;
        
        }

        public function countTeachers () {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `users` WHERE `role_id` = 2');  

            $result = $this->db->resultSet();
            
            $result = $this->db->rowCount();

            return $result;
                    

        }



        //Users

        public function getStudents() {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `users` WHERE `role_id` = 3');  
            
            $result = $this->db->resultSet();

            return $result;
        
        }


        Public function getEachStudents($id) {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `users` WHERE `user_id` = :id');  

            $this->db->bind(':id', $id);

            $this->db->execute();

            $result= $this->db->single();
            // $result = $this->db->resultSet();


            return $result;

        }
        

        public function countUsers() {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `users` WHERE `role_id` = 3');  

            $result = $this->db->resultSet();

            $result = $this->db->rowCount();

            return $result;
                    

        }

       
      
        public function updateProfile($data) 
        {
            $this->db->query('UPDATE users SET full_name=:fullname, tel = :phoneNo, address = :address, photo = :photo WHERE user_id = :userid ');

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

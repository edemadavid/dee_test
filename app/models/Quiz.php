<?php
    class Quiz {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }


        public function getQuestion () {

            $this->db->query(' SELECT * FROM `quizes` ');

            $result = $this->db->resultSet();

            return $result;

           
            
        }



        public function getUniqueQuiz($id)
        {

            $this->db->query('SELECT * FROM quizes where author_id = :id');

            $this->db->bind (':id', $id);

            $this->db->execute();

            $result = $this->db->resultSet();

            return $result;
            
        }


        public function createQuiz($data) 
        {
            $this->db->query('INSERT INTO quizes(subject_id, level_id, question, opt_A, opt_B, opt_C, opt_D, answer, author_id) Values (:subject, :level, :question, :optA, :optB, :optC, :optD, :answer, :author)');


            //Binding our Statements
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':level', $data['level']);
            $this->db->bind(':question', $data['question']);
            $this->db->bind(':optA', $data['optA']);
            $this->db->bind(':optB', $data['optB']);
            $this->db->bind(':optC', $data['optC']);
            $this->db->bind(':optD', $data['optD']);
            $this->db->bind(':answer', $data['answer']);
            $this->db->bind(':author', $data['author']);

            
            //Execute the function
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function getEachTeachersQuiz($id, $userid)
        {

            $this->db->query("SELECT * FROM `quizes` where `author_id` = :userid AND `subject_id` = :id");

            
            $this->db->bind(':id', $id);
            $this->db->bind(':userid', $userid);

            // $this->db->execute();
            $result = $this->db->resultSet();

            return $result;

        }

        public function getEachTeachersQuizWithLevels($id, $userid, $level)
        {

            $this->db->query("SELECT * FROM `quizes` where `author_id` = :userid AND `subject_id` = :id AND `level_id` = :level");

            
            $this->db->bind(':id', $id);
            $this->db->bind(':userid', $userid);
            $this->db->bind(':level', $level);

            // $this->db->execute();
            $result = $this->db->resultSet();

            return $result;

        }


        public function countEachTeachersQuiz($id, $userid)
        {

            $this->db->query("SELECT * FROM `quizes` where `author_id` = :userid AND `subject_id` = :id");

            
            $this->db->bind(':id', $id);
            $this->db->bind(':userid', $userid);

            $result = $this->db->resultSet();

            $result = $this->db->rowCount();

            return $result;

        }

        public function countEachQuiz($id)
        {

            $this->db->query("SELECT * FROM `quizes` where  `subject_id` = :id");

            
            $this->db->bind(':id', $id);
            

            $result = $this->db->resultSet();

            $result = $this->db->rowCount();

            return $result;

        }




        public function countQuizes () {
            //this is a prepared statment
            $this->db->query('SELECT * FROM `quizes`');  

            $result = $this->db->resultSet();
            
            $result = $this->db->rowCount();

            return $result;
                    

        }

        public function getEachQuiz($id)
        {

            $this->db->query("SELECT * FROM `quizes` where `id` = :id");

            
            $this->db->bind(':id', $id);

            $result = $this->db->single();

            // $result = $\this->db->rowCount();

            return $result;

        }

        public function update($data) 
        {
            $this->db->query('UPDATE quizes SET subject_id=:subject, level_id = :level, question = :question, opt_A = :optA, opt_B = :optB,  opt_C = :optC, opt_D = :optD, answer = :answer WHERE id = :id ');


            //Binding our Statements
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':level', $data['level']);
            $this->db->bind(':question', $data['question']);
            $this->db->bind(':optA', $data['optA']);
            $this->db->bind(':optB', $data['optB']);
            $this->db->bind(':optC', $data['optC']);
            $this->db->bind(':optD', $data['optD']);
            $this->db->bind(':answer', $data['answer']);
            $this->db->bind(':id', $data['id']);

            
            //Execute the function
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function delete($id) {
            $this->db->query('DELETE FROM quizes WHERE id = :id');
    
            $this->db->bind(':id', $id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }




        //Models for the Students /users

        public function getQuizTest($subject_id, $level_id)
        {

            $this->db->query("SELECT * FROM `quizes` where `subject_id` = :subject_id AND `level_id` = :level_id");

            
            $this->db->bind(':subject_id', $subject_id);
            $this->db->bind(':level_id', $level_id);


            $result = $this->db->resultSet();


            return $result;

        }


    }

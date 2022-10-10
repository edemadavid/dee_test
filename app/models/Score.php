<?php
    class Score {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }


        public function storeResult ($data) {
            $this->db->query('INSERT INTO scores(user_id, subject_id, level_id, score, questionCount) Values (:userid, :subjectid, :levelid, :score, :questionCount)');


            //Binding our Statements
            $this->db->bind(':userid', $data['userid']);
            $this->db->bind(':subjectid', $data['subjectid']);
            $this->db->bind(':levelid', $data['levelid']);
            $this->db->bind(':score', $data['score']);
            $this->db->bind(':questionCount', $data['questionCount']);


            
            //Execute the function
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function getScore($userid) {
            $this->db->query('SELECT * FROM scores where user_id = :userid');

            $this->db->bind (':userid', $userid);

            $this->db->execute();

            $result = $this->db->resultSet();

            return $result;
        }

        public function getOptions () {


        }

        public function StoreOptions () {


        }



    }



    
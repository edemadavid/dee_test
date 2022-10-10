<?php

require_once __DIR__ .'../../interfaces/ResourceInterface.php';

class SubjectController extends Controller implements ResourceInterface {


    public function __construct() {
        $this->profile = $this->model('Profile');

        $this->subject = $this->model('Subject');

        $this->quiz = $this->model('Quiz');

    }

    


    public function index() 
    {

        if (! ( isloggedin() && isAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }
        $userid = $_SESSION['id'];
        $profile = $this->profile->getEachProfile($userid);
     
        
        $subjects= $this->subject->getSubjects();

        foreach ($subjects as $subject) {
            $id = $subject->id;
            // return $countquizes;
            $countquizes [$id] = $this->quiz->countEachQuiz($id);
            
        } 


        $data = [

            'title'=> 'Subjects',
            'profile' => $profile,

            'subjects' => $subjects,

            'count' => $countquizes

        ];

        $this->view('admin/subjects/index', $data);



    }


    public function create() 
    {

        if (! ( isloggedin() && isAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $userid = $_SESSION['id'];
        $profile = $this->profile->getEachProfile($userid);



        $data = [
            'title' => 'Subjects',
            'profile' => $profile,

            'subjectTitleError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitise all post data by encoding unwanted character
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Array of Varible going to the view
            $data = [
                'title' => 'Subjects',
                'subjectTitle' => trim($_POST['subjectTitle']),
                'subjectTitleError' => ''

            ];

            //this checks if the subject title is empty
            if (empty($data['subjectTitle'])){
                $data['subjectTitleError'] = "Please Enter a subject";
            } 

            //checks if subject exist
            if ($this->subject->checkSubjectExist($data['subjectTitle'])) {
                $data['subjectTitleError'] = "Subject Already Exist";
            }

            if ( empty ($data['subjectTitleError'])) {

                if($this->subject->create($data)) {
                    header('Location:' . URLROOT . 'subjectcontroller');
                }
            }


        }





        $this->view('admin/subjects/createSubject', $data);


    }

    public function add() 
    {


    }

    public function show($id) {


    }

    public function update($id) {

        if (! ( isloggedin() && isAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $userid = $_SESSION['id'];
        $profile = $this->profile->getEachProfile($userid);
     
        
        $subjects= $this->subject->getOneSubject($id);


        $data = [

            'title'=> 'Subjects',
            'profile' => $profile,

            'subjects' => $subjects
    
        ];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitise all post data by encoding unwanted character
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Array of Varible going to the view
            $data = [
                'title' => 'Subjects',
                'subjectTitle' => trim($_POST['subjectTitle']),
                'id' => $id,
                'subjectTitleError' => ''

            ];

            //this checks if the subject title is empty
            if (empty($data['subjectTitle'])){
                $data['subjectTitleError'] = "Please Enter a subject";
            } 

            //checks if subject exist
            if ($this->subject->checkSubjectExist($data['subjectTitle'])) {
                $data['subjectTitleError'] = "Subject Already Exist";
            }

            if ( empty ($data['subjectTitleError'])) {

                if($this->subject->update($data)) {
                    header('Location:' . URLROOT . 'subjectcontroller');
                }
            }

        }


        $this->view('admin/subjects/updateSubject', $data);


    }


    public function softDelete() {


    }

    public function delete($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->subject->deleteSubject($id)) {
                    header("Location: " . URLROOT . "/subjectcontroller");
            } else {
               die('Something went wrong!');
            }
        }


    }








}
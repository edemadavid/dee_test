<?php

require_once __DIR__ .'../../interfaces/UniqueInterface.php';

class QuizController extends Controller implements UniqueInterface {


    public function __construct() {
        $this->user = $this->model('User');

        $this->quiz = $this->model('Quiz');

        $this->subject = $this->model('Subject');

        $this->level = $this->model('Level');

        $this->profile = $this->model('Profile');



        // $user = $_SESSION['id'];

    }

    
    
    //This is also the Teachers Homepage
    public function index() 
    {

        $userid = $_SESSION['id'];

        $profile = $this->profile->getEachProfile($userid);

        if (! ( isloggedin() && isAdmin() || isSubAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }
     
        // $userid = $_SESSION["id"];

        $quizes = $this->quiz->getUniqueQuiz($userid);

        $subjects = $this->subject->getSubjects();

        foreach ($subjects as $subject) {
            $id = $subject->id;
            // return $countquizes;
            $countquizes [$id] = $this->quiz->countEachTeachersQuiz($id, $userid);
            
        } 

        $data = [

            'title'=> 'TeacherDashboard',

            'profile' => $profile,

            'quizes' =>  $quizes,

            'subjects' => $subjects,

            'count' => $countquizes
    
        ];

        $this->view('admin/quizes/index', $data);

    }

    public function create() 
    {
        $id = $userid = $_SESSION['id'];
        

        if (! ( isloggedin() && isAdmin() || isSubAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $profile = $this->profile->getEachProfile($userid);
     

        $subjects = $this->subject->getSubjects();

        $levels = $this->level->getLevels();


        

        $data = [
            'profile' => $profile,

            'id' => $id,

            'title'=> 'quiz',

            'subjects' =>  $subjects,

            'levels' => $levels,

            //Form Inputs
            'question' => '',
            'optA' => '',
            'optB' => '',
            'optC' => '',
            'optD' => '',
            'answer' => '',

            //Form Error Variables
            'subjectError' => '',
            'levelError' => '',
            'questionError' => '',
            'optAError' => '',
            'optBError' => '',
            'optCError' => '',
            'optDError' => '',
            'answerError' => '',


            'test'=>''

        ];



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitise all post data by encoding unwanted character
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'id' => $id,

                'title'=> 'quiz',

                'subjects' =>  $subjects,

                'levels' => $levels,

                'author' => trim($_POST['author']),
                'subject' => trim($_POST['subject']),
                'level' => trim($_POST['level']),
                'question' => trim($_POST['question']),
                'optA' => trim($_POST['optA']),
                'optB' => trim($_POST['optB']),
                'optC' => trim($_POST['optC']),
                'optD' => trim($_POST['optD']),
                'answer' => trim($_POST['answer']),


                'subjectError' => '',
                'levelError' => '',
                'questionError' => '',
                'optAError' => '',
                'optBError' => '',
                'optCError' => '',
                'optDError' => '',
                'answerError' => '',


                'test'=>''

            ];
                
            if ( ($data['subject']) == 0) 
            {
            $data['subjectError'] = "Please Select a Subject";
            }
            if ( ($data['level']) == 0) 
            {
            $data['levelError'] = "Please Select a Level";
            }


            //Question Validation Validation
            if (empty($data['question'])) 
            {
            $data['questionError'] = "Please Set a question";
            }
            if (empty($data['optA'])) 
            {
            $data['optAError'] = "Option A is Empty";
            }
            if (empty($data['optB'])) 
            {
            $data['optBError'] = "Option B is Empty";
            }
            if (empty($data['optC'])) 
            {
            $data['optCError'] = "Option C is Empty";
            }
            if (empty($data['optD'])) 
            {
            $data['optDError'] = "Option D is Empty";
            }



            if ( ($data['answer']) == '0' ) 
            {
            $data['answerError'] = "Please Select an Answer";
            }


            if ( 
                empty($data['subjectError'])
                && empty($data['levelError'])
                && empty($data['questionError'])
                && empty($data['optAError'])
                && empty($data['optBError'])
                && empty($data['optCError'])
                && empty($data['optDError'])
                && empty($data['answerError'])
            ) {
               
                if ($this->quiz->createQuiz($data)) {
                    header('Location:' . URLROOT . 'quizcontroller/show/'.$data['subject']);
                }
            }
            else 
            {
                $data['test'] = "Failed";
            }

        }

        $this->view('admin/quizes/createQuiz', $data);



    }

    public function add() 
    {


    }

    public function show($id) 
    {
        if (! ( isloggedin() && isAdmin() || isSubAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }
   

        $userid = $_SESSION["id"];

        $profile = $this->profile->getEachProfile($userid);

        $levels = $this->level->getLevels();

        foreach ($levels as $level){
            $quizesWithLevel[$level->id] = $this->quiz->getEachTeachersQuizWithLevels($id, $userid, $level->id);

        } 
       
        $subject = $this->subject->getEachSubjects($id);

        $data = [
            'title' => 'Quiz',
            'profile' => $profile,

            'levels' => $levels,

            'test' =>   $quizesWithLevel,

            'subject' => $subject

        ];
        
        $this->view('admin/quizes/eachTeacherQuiz', $data);
    }

    public function update($id) 
    {
        if (! ( isloggedin() && isAdmin() || isSubAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }


        $userid = $_SESSION["id"];

        $profile = $this->profile->getEachProfile($userid);


        $subjects = $this->subject->getSubjects();

        $levels = $this->level->getLevels();

        $quiz = $this->quiz->getEachQuiz($id);

        

        $data = [

            'user_id' => $userid,

            'profile' => $profile,

            'title'=> 'quiz',

            'subjects' =>  $subjects,

            'levels' => $levels,

            'quiz' => $quiz,

            //Form Inputs
            'question' => '',
            'optA' => '',
            'optB' => '',
            'optC' => '',
            'optD' => '',
            'answer' => '',

            //Form Error Variables
            'subjectError' => '',
            'levelError' => '',
            'questionError' => '',
            'optAError' => '',
            'optBError' => '',
            'optCError' => '',
            'optDError' => '',
            'answerError' => '',


            'test'=>''

        ];



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitise all post data by encoding unwanted character
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'id' => $id,

                'title'=> 'quiz',

                'subjects' =>  $subjects,

                'levels' => $levels,

                'author' => trim($_POST['author']),
                'subject' => trim($_POST['subject']),
                'level' => trim($_POST['level']),
                'question' => trim($_POST['question']),
                'optA' => trim($_POST['optA']),
                'optB' => trim($_POST['optB']),
                'optC' => trim($_POST['optC']),
                'optD' => trim($_POST['optD']),
                'answer' => trim($_POST['answer']),


                'subjectError' => '',
                'levelError' => '',
                'questionError' => '',
                'optAError' => '',
                'optBError' => '',
                'optCError' => '',
                'optDError' => '',
                'answerError' => '',


                'test'=>''

            ];
                
            if ( ($data['subject']) == 0) 
            {
            $data['subjectError'] = "Please Select a Subject";
            }
            if ( ($data['level']) == 0) 
            {
            $data['levelError'] = "Please Select a Level";
            }


            //Question Validation Validation
            if (empty($data['question'])) 
            {
            $data['questionError'] = "Please Set a question";
            }
            if (empty($data['optA'])) 
            {
            $data['optAError'] = "Option A is Empty";
            }
            if (empty($data['optB'])) 
            {
            $data['optBError'] = "Option B is Empty";
            }
            if (empty($data['optC'])) 
            {
            $data['optCError'] = "Option C is Empty";
            }
            if (empty($data['optD'])) 
            {
            $data['optDError'] = "Option D is Empty";
            }



            if ( ($data['answer']) == '0' ) 
            {
            $data['answerError'] = "Please Select an Answer";
            }


            if ( 
                empty($data['subjectError'])
                && empty($data['levelError'])
                && empty($data['questionError'])
                && empty($data['optAError'])
                && empty($data['optBError'])
                && empty($data['optCError'])
                && empty($data['optDError'])
                && empty($data['answerError'])
            ) {
               
                if ($this->quiz->update($data)) {
                    header('Location:' . URLROOT . 'quizcontroller/show/'.$data['subject']);
                }
            }
            else 
            {
                $data['test'] = "Failed";
            }

        }

        $this->view('admin/quizes/updateQuiz', $data);


    }


    public function softDelete() {


    }

    public function delete($id) {

        

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->quiz->delete($id)) {
                    header("Location: " . URLROOT . "/quizcontroller");
            } else {
               die('Something went wrong!');
            }
        }


    }

    
}
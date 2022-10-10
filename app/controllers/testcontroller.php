<?php

require_once __DIR__ .'../../interfaces/UniqueInterface.php';

class TestController extends Controller  {


    public function __construct() {
        $this->user = $this->model('User');
        $this->profile = $this->model('Profile');

        $this->subject = $this->model('Subject');
        $this->level=$this->model('Level');
        $this->quiz = $this->model('Quiz');
        $this->score = $this->model('Score');
        

    }

    


    public function index() 
    {

        if (! ( isloggedin() && isStudent() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $userid = $_SESSION['id'];

        $profile = $this->profile->getEachProfile($userid);

        $level = $this->level->getLevels();

        foreach ($level as $eachLevel) {
            $id = $eachLevel->id;

            $levelName[$id] = $eachLevel->name;
            
        }
        
        $subjects= $this->subject->getSubjects();

        foreach ($subjects as $subject) {
            $id = $subject->id;

            $eachSubject [$id] = $subject->name;
            // return $countquizes;
            $countquizes [$id] = $this->quiz->countEachQuiz($id);
            
        }
        
        $scoreTable = $this->score->getScore($userid);

        $data = [

            'title'=> 'Testpage',
            'profile' => $profile,

            'subjects' => $subjects,
            'level' => $level,

            'scoreTable' => $scoreTable,

            'eachSubject' => $eachSubject,

            'levelName' => $levelName

            // 'count' => $countquizes
            // 'teachers' =>  $teachers

    
        ];

        $this->view('testpage/index', $data);



       
    }
    

    public function test($subject_id, $level_id) 
    {
        if (! ( isloggedin() && isStudent() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $userid = $_SESSION['id'];

        $profile = $this->profile->getEachProfile($userid);


        $quizes = $this->quiz->getQuizTest($subject_id, $level_id);
        



        $data = [

            'title'=> 'Testpage',
            'profile' => $profile,

            'quizes' => $quizes,

           
            // 'teachers' =>  $teachers
    
        ];

        $this->view('testpage/taketest', $data);



    }

    public function storeResult() 
    {
        if (! ( isloggedin() && isStudent() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $userid = $_SESSION['id'];

        $profile = $this->profile->getEachProfile($userid);
     
        $level_id = trim($_POST['level_id']);
        $subject_id = trim($_POST['subject_id']);

        $count = 0;
     
        


        $quizes = $this->quiz->getQuizTest($subject_id, $level_id);
         
        foreach ($quizes as $quiz){
       
            $choices[$quiz->id]=  $_POST[$quiz->id.'choice'];
            $answer[$quiz->id] = $quiz->answer;

            if ($choices[$quiz->id] == $answer[$quiz->id] ) {
                $count++;
            }
             
        }

        $percentage =  ($count/count($quizes) * 100);


        

        $data = [

            'title'=> 'Testpage',

            'profile' => $profile,

            'quizes' => $quizes,

            'count' => $count,

            'choices' => $choices,

            'answer' => $answer,

            'percentage' => $percentage,

            //other info
            'userid' => $userid,
            'levelid' => $level_id,
            'subjectid' => $subject_id ,
            'score'=> $count,
            'questionCount' => count($quizes)

        ];

        if ($this->score->storeResult($data)) {
            $data['test'] = "Stored Successfully";
        } 
        else 
        {
            $data['test'] = "Failed";
        }




        $this->view('testpage/showResult', $data);

    }

    public function show($id) {


    }

    public function update($id) {


    }


    public function softDelete() {


    }

    public function delete($id) {


    }
}
<?php

require_once __DIR__ .'../../interfaces/ResourceInterface.php';

class StudentController extends Controller implements ResourceInterface {


    public function __construct() {
        $this->user = $this->model('User');
        $this->profile = $this->model('Profile');

        $this->subject = $this->model('Subject');
        $this->level = $this->model('Level');
        $this->quiz = $this->model('Quiz');
        $this->score = $this->model('Score');



    }

    


    public function index() 
    {

        if (! ( isloggedin() && isAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $userid = $_SESSION['id'];

        $profile = $this->profile->getEachProfile($userid);
     
        
        $students = $this->user->getStudents();


        $data = [

            'title'=> 'Students',
            'profile' => $profile,

            'students' => $students 
    
        ];

        $this->view('admin/users/index', $data);



    }
    
    public function create() {


    }

    public function add() {


    }

    public function show($id) 
    {
        
        $userid = $_SESSION['id'];
        $profile = $this->profile->getEachProfile($userid);


        $students = $this->user->getEachStudents($id);
        $studentProfile = $this->profile->getEachProfile($id);

        $level = $this->level->getLevels();

        foreach ($level as $eachLevel) {
            $idLev = $eachLevel->id;

            $levelName[$idLev] = $eachLevel->name;
            
        }
        
        $subjects= $this->subject->getSubjects();

        foreach ($subjects as $subject) {
            $idSub = $subject->id;

            $eachSubject [$idSub] = $subject->name;
            // // return $countquizes;
            // $countquizes [$idSub] = $this->quiz->countEachQuiz($id);
            
        }
        
        $scoreTable = $this->score->getScore($id);

        $data = [

            'title'=> 'Students',

            'profile' => $profile,

            'students' => $students, 

            'studentProfile' => $studentProfile,

            'subjects' => $subjects,

            'level' => $level,

            'scoreTable' => $scoreTable,
            
            'eachSubject' => $eachSubject,

            'levelName' => $levelName
            

    
        ];


        $this->view('admin/users/showUser', $data);
    }

    public function update($id) {


    }


    public function softDelete() {


    }

    public function delete($id) {


    }

    
}


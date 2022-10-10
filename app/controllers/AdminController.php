<?php

require_once __DIR__ .'../../interfaces/AdminInterface.php';

class AdminController extends Controller implements AdminInterface {


    public function __construct() {
        $this->user = $this->model('User');

        $this->profile = $this->model('Profile');

        $this->quiz = $this->model('Quiz');

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

        $superAdmin = $this->user->getSuperAdmin();
        $teachers = $this->user->getTeachers();
        $students = $this->user->getStudents();
        $subjects= $this->subject->getSubjects();

        //Counts Models
        $countUsers = $this->user->countUsers();
        $countTeachers = $this->user->countTeachers();
        $countSubjects = $this->subject->countSubjects();
        $countQuizes = $this->quiz->countQuizes();

        

        $data = [

            'title' => "Admin Dashboard",
            'profile' => $profile,

            // Counts
            'countUsers' => $countUsers,
            'countTeachers' => $countTeachers,
            'countSubjects' => $countSubjects,
            'countQuizes'=> $countQuizes,

            
            // Lists
            'superAdmin' => $superAdmin,
            'teachers' => $teachers,
            'students' => $students,
            'subjects' => $subjects
    
        ];

        $this->view('admin/index', $data);

    }


    public function registerSubAdmin()
    {
        
    }

    public function sendMail()
    {
        
    }

    public function sendNotification()
    {
        
    }

}
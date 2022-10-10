<?php

require_once __DIR__ .'../../interfaces/ResourceInterface.php';

class TeacherController extends Controller implements ResourceInterface {


    public function __construct() {
        $this->user = $this->model('User');
        $this->profile = $this->model('Profile');


    }

    


    public function index() 
    {

        if (! ( isloggedin() && isAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $userid = $_SESSION['id'];

        $user = $this->user->getAnyUser($userid);

        $profile = $this->profile->getEachProfile($userid);
     
        
        $teachers = $this->user->getTeachers();

        foreach ($teachers as $teacher){
            $teacherId = $teacher->user_id;
          $teachersProfile [$teacherId] = $this->profile->getEachProfile($teacherId);  
        }
        

        $data = [

            'title'=> 'Teachers',
            'profile' => $profile,

            'teachers' =>  $teachers,
            'teachersProfile' => $teachersProfile
    
        ];

        $this->view('admin/subAdmins/index', $data);



    }
    
    public function create()
    {   
        if (! ( isloggedin() && isAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $userid = $_SESSION['id'];

        $profile = $this->profile->getEachProfile($userid);

        $data = [
            'title' => 'Teachers',
            'profile' => $profile,

            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'hashedpassword'=> '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'Error' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitise all post data by encoding unwanted character
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Register Admin',
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'userrole' => 2,
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'Error' => ''
            ];

            //Username Validation
            if (empty($data['username'])) {
                $data['usernameError'] = "Please enter username.";

            //check if the input is alpha-numeric, and prevents special characters
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $data['username'])) {
                $data['usernameError'] = "Username can only contain letters and number";

            //Check if username exists.
            } else {
                if ($this->user->findUserByUsername($data['username'])) {
                    $data['usernameError'] = "Username already exist.";
                }
            }


            //Email Validation
            if (empty($data['email'])) {
                $data['emailError'] = "Please enter your Email.";

            //check if email is valid
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = "Email is not correct.";

            //Check if email exists.                
            } else {
                if ($this->user->findUserByEmail($data['email'])) {
                    $data['emailError'] = "Email already exist.";
                }
            }


            //Password Validation
            if (empty($data['password'])) {
                $data['passwordError'] = "Please enter password.";

            //check if lenght is less than 6
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = "enter six characters";
            }


            //Password match validation
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = "Please confirm your password.";
            } elseif ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = "password do not match";
                }
            

            //check for no further error before submitting
            if (  empty ($data['usernameError'] )
                    && empty ($data['emailError'] ) 
                    && empty ($data['passwordError']) 
                    && empty ($data['confirmPasswordError'])
                )
            {

                //encrypts the password
                $data['hashedpassword'] = password_hash($data['password'], PASSWORD_DEFAULT);
                
                

                //register user 
                if ($this->user->registerSubAdmin($data)) {
                    header('Location:' . URLROOT . 'teachercontroller');

                //A fail-safe measure to be sure data enters the database
                } else {
                    $data['Error'] = "Registration Not Successful, Please Try Again";
                    die('Something went wrong');
                    
                }
            } else {
                $data['Error'] = "Please correct the errors to continue";
            }
        
        }

        $this->view('admin/subAdmins/createSubAdmin', $data);
    }


    

    public function add() 
    {


    }


    public function show($id) 
    {
        if (! ( isloggedin() && isAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $teachers = $this->user->findUserbyId($id);


        $data = [
            'title'=> 'Teachers',
            'teachers' => $teachers,
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        $this->view('admin/subAdmins/updateSubAdmin', $data);

    }


    public function update($id) 
    {
        if (! ( isloggedin() && isAdmin() ) )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $userid = $_SESSION['id'];
        $profile = $this->profile->getEachProfile($userid);

        $teachers = $this->user->findUserbyId($id);


        $data = [
            'title'=> 'Teachers',
            'profile' => $profile,
            'teachers' => $teachers,
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitise all post data by encoding unwanted character
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title'=> 'Teachers',
                'teachers' => $teachers,
                'id' => $id,
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'userrole' => 2,
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            //Username Validation
            if (empty($data['username'])) {
                $data['usernameError'] = "Please enter username.";

            //check if the input is alpha-numeric, and prevents special characters
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $data['username'])) {
                $data['usernameError'] = "Username can only contain letters and number";

            //Check if username exists.
            } else {
                if ($this->user->findUserByUsername($data['username'])) {
                    $data['usernameError'] = "Username already exist.";
                }
            }


            //Email Validation
            if (empty($data['email'])) {
                $data['emailError'] = "Please enter your Email.";

            //check if email is valid
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = "Email is not correct.";

            //Check if email exists.                
            } else {
                if ($this->user->findUserByEmail($data['email'])) {
                    $data['emailError'] = "Email already exist.";
                }
            }


            //Password Validation
            if (empty($data['password'])) {
                $data['passwordError'] = "Please enter password.";

            //check if lenght is less than 6
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = "enter six characters";
            }


            //Password match validation
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = "Please confirm your password.";
            } elseif ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = "password do not match";
                }
            

            //check for no further error before submitting
            if (  empty ($data['usernameError'] )
                    && empty ($data['emailError'] ) 
                    && empty ($data['passwordError']) 
                    && empty ($data['confirmPasswordError'])
                )
            {

                //encrypts the password
                $data['hashedpassword'] = password_hash($data['password'], PASSWORD_DEFAULT);
                

                //register user 
                if ($this->user->registerSubAdmin($data)) {
                    header('Location:' . URLROOT . 'teachercontroller');

                //A fail-safe measure to be sure data enters the database
                } else {
                    $data['Error'] = "Registration Not Successful, Please Try Again";
                    die('Something went wrong');
                    
                }
            } else {
                $data['Error'] = "Please correct the errors to continue";
            }

                
               
            
        }


        $this->view('admin/subAdmins/updateSubAdmin', $data);



    }


    public function softDelete() 
    {


    }

    public function delete($id) 
    {


        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->user->deleteUser($id)) {
                    header("Location: " . URLROOT . "/teachercontroller");
            } else {
               die('Something went wrong!');
            }
        }

    }

    
}


<?php
class UserController extends Controller
{
    public function __construct()
    {
        $this->user = $this->model('User');
    }



    public function register()
    {
        $data = [
            'title' => 'Register',
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
                'title' => 'Register',
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
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
                if ($this->user->register($data)) {
                    header('Location:' . URLROOT . 'usercontroller/login');

                //A fail-safe measure to be sure data enters the database
                } else {
                    $data['Error'] = "Registration Not Successful, Please Try Again";
                    die('Something went wrong');
                    
                }
            } else {
                $data['Error'] = "Something went wrong";
            }
        
        }


        $this->view('auth/register', $data);
    }


    public function login()
    {
        $data = [
                'title' => 'Login',
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //Sanitise all post data by encoding unwanted character
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Login',
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => ''

            ];
            //check if username is empty
            if (empty($data['username'])) {
                $data['usernameError'] = "Please enter username.";

                if (empty($data['password'])) {
                    $data['passwordError'] = "Please enter your password.";
                }
            }

            // chcek if password is empty
            if (empty($data['password'])) {
                $data['passwordError'] = "Please enter your password.";
            }

            if (
                    empty($data['usernameError']) && 
                    empty($data['passwordError']) 
                ) 
                { 
                
                if ($this->user->findUserByUsername($data['username'])) {

                    // $data['passwordError'] = "It got here";
                   
                    $loggedInUser = $this->user->login($data['username'], $data['password']); 
                    if ($loggedInUser) {
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['passwordError'] = "Password is not correct";
                    }
                    
                   
                } else {
                    $data['usernameError'] = "User does not exist";
                }
            }


        } 
        

        $this->view('auth/login', $data);
    }



    public function createUserSession($user)
    {
        // session_start();
        $_SESSION['role'] = $user->role_id;
        $_SESSION['name'] = $user->users_name;

        if ($_SESSION['role'] == 1) {

            $_SESSION['id'] = $user->user_id;
            $_SESSION['adminName'] = $user->users_name;
            $_SESSION['adminEmail'] = $user->user_email;

            header('location:' . URLROOT . 'admincontroller/index');
        } elseif ($_SESSION['role'] == 2) {

            $_SESSION['id'] = $user->user_id;
            $_SESSION['teacherName'] = $user->users_name;
            $_SESSION['teacherEmail'] = $user->user_email;

            header('location:' . URLROOT . 'quizcontroller/index');
        } elseif ($_SESSION['role'] == 3) {
            $_SESSION['id'] = $user->user_id;
            $_SESSION['studentName'] = $user->users_name;
            $_SESSION['studentEmail'] = $user->user_email;

            header('location:' . URLROOT . 'testcontroller/index');
        } else {

            header('location:' . URLROOT . '/usercontroller/testpage');
        }

        





    }


    public function logout() 
    {
        unset($_SESSION['role']);

        unset($_SESSION['id']);

        unset($_SESSION['adminName']);
        unset($_SESSION['adminEmail']);

        unset($_SESSION['teacherName']);
        unset($_SESSION['teacherEmail']);

        unset($_SESSION['studentName']);
        unset($_SESSION['studentEmail']);


        header('location:' . URLROOT . 'homepage/index');
    }





    //
    //
    //Profile
    //
    //


    public function profile()
    {
        $userid = $_SESSION['id'];

        if (!  isloggedin()  )  {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        // $profile = $this->profile->getEachProfile($userid);

        $user = $this->user->getAnyUser($userid);


        $data = [

            'title' => "Profile",

            // 'profile' => $profile,

            'user' => $user
        ];

        $this->view('profile/index', $data);

    }


    public function updateProfile() 
    {
        $userid = $_SESSION['id'];

        if (!  isloggedin()  )  
        {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        // $profile = $this->profile->getEachProfile($userid);

        $user = $this->user->getAnyUser($userid);

        if (empty($user->photo)){
            $previousPhoto = '';
        } else { $previousPhoto = FILE_ROOT.$user->photo;}


        $data = [

            'title' => "Profile",

            // 'profile' => $profile,

            'user' => $user,

            'test' => $previousPhoto,
  
            'fullnameError' => '',
            'addressError' => '',
            'phoneError' => '',
            'imageError' => ''

        ];


        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {

            // Variable Declaration
            $username = $user->users_name;


            $previousPhoto = FILE_ROOT.$user->photo;
            $fileDestination = '';

            $userid = $_SESSION['id'];

            //Sanitise all post data by encoding unwanted character
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            
            $file = $_FILES["file"];
            $fileName = $_FILES["file"]["name"];
            $fileTmpName = $_FILES["file"]["tmp_name"];
            $fileSize = $_FILES["file"]["size"];
            $fileError = $_FILES["file"]["error"];
            $fileType = $_FILES["file"]["type"];
            
    
            $fileExt = explode ('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
    
            $allowed = array ('jpg','jpeg','png');
    
    
            if (in_array($fileActualExt, $allowed)){
                if($fileError===0){
                    if ($fileSize < 50000000) {
                        $fileNameNew = $username."-".uniqid().".".$fileActualExt;
                        $fileDestination = 'img/profile/'.$fileNameNew;
                        
                    }   else { $data['imageError'] ='your file is too big';}
                }   else { $data['imageError'] ='There was an error uploading your file';}
            }   else{ $data['imageError'] = 'File type not allowed!';}

            if (empty($fileDestination)) {
                $fileDestination = $user->photo;
            }
        

            $data = [ 

                'userid' => $_SESSION['id'],

                'title' => "Profile",

                // 'profile' => $profile,
    
                'user' => $user,

                'fullname'=> trim($_POST['fullname']),
                'address' => trim($_POST['address']),
                'phoneNo' => trim($_POST['phoneNo']),

                'photo' => $fileDestination,

                'fullnameError' => '',
                'addressError' => '',
                'phoneError' => '',
                'imageError' => ''

            ];

            //fullname Validation
            if (empty($data['fullname'])){
                $data['fullnameError'] = "This field cant be empty";

            } 

            if (empty($data['address'])) {
                $data['addressError'] = "This field cant be empty";

            } 
            if (empty($data['phoneNo'])) {
                $data['phoneError'] = "This field cant be empty";
            }

            if (  empty ($data['fullnameError'] )
                && empty ($data['addressError'] ) 
                && empty ($data['phoneError']) 
                && empty ($data['imageError'])
            ) {

                if ($this->user->updateProfile($data)) 
                {
                    // TODO unlink not working
                    unlink($previousPhoto);
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header('Location:' . URLROOT . 'profilecontroller/index');
                //A fail-safe measure to be sure data enters the database
                } else {
                    $data['Error'] = "Update Not Successful, Please Try Again";
                    die('Something went wrong');
                    
                }

                
            } else {
                echo "test";
            }

        }
    
    
        $this->view('profile/updateProfile', $data);
    }




}

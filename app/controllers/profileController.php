<?php
class ProfileController extends Controller {


    public function __construct() {
        $this->profile = $this->model('Profile');

        $this->user = $this->model('User');


    }

    


    public function index() 
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


    public function create()
    {
        $userid = $_SESSION['id'];

        $profile = $this->profile->getEachProfile($userid);

        if (!  isloggedin()  )  
        {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $baseProfile = $this->user->getAnyUser($userid);

        $data = [

            'title' => "Profile",

            'baseProfile' => $baseProfile,
            'profile' => $profile,
  
            'fullnameError' => '',
            'addressError' => '',
            'phoneError' => '',
            'imageError' => ''

        ];


        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {

            // Variable Declaration
            $username = $baseProfile->users_name;

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
        

            $data = [ 

                'userid' => $_SESSION['id'],

                'title' => "Profile",

                'baseProfile' => $baseProfile,

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

                if ($this->profile->create($data)) 
                {
                    // TODO unlink not working
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
    
    
        $this->view('profile/createProfile', $data);
    }




    public function update()
    {
        $userid = $_SESSION['id'];

        if (!  isloggedin()  )  
        {
            header('location:' . URLROOT . 'usercontroller/login');
        }

        $profile = $this->profile->getEachProfile($userid);

        $baseProfile = $this->user->getAnyUser($userid);

        if (empty($profile->photo)){
            $previousPhoto = '';
        } else { $previousPhoto = FILE_ROOT.$profile->photo;}


        $data = [

            'title' => "Profile",

            'profile' => $profile,

            'baseProfile' => $baseProfile,

            'test' => $previousPhoto,
  
            'fullnameError' => '',
            'addressError' => '',
            'phoneError' => '',
            'imageError' => ''

        ];


        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {

            // Variable Declaration
            $username = $baseProfile->users_name;


            $previousPhoto = FILE_ROOT.$profile->photo;
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
                $fileDestination = $profile->photo;
            }
        

            $data = [ 

                'userid' => $_SESSION['id'],

                'title' => "Profile",

                'profile' => $profile,
    
                'baseProfile' => $baseProfile,

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

                if ($this->profile->update($data)) 
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
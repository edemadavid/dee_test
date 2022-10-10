<?php
class Homepage extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {
        // $users = $this->userModel->getUsers();

        // $data = [
        //     'title' => 'Home page1',
        //     'users' => $users
        // ];

        $this->view('index');
    }
    
}

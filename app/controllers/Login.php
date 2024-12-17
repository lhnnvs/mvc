<?php

class Login extends Controller
{
    public function index()
    {
        $errors = [];
        $user = new User();
        $loghistory = new Loghistory();

        if (count($_POST) > 0) {
            $arr['email'] = $_POST['email'];
            $row = $user->first($arr);

            if ($row) {
                if (password_verify($_POST['password'], $row->password)) {

                    $loginData = [
                        'account' => $row->email, 
                        'lastseen' => date('Y-m-d H:i:s'), 
                        'login' => date('Y-m-d H:i:s'), 
                        'ip' => $_SERVER['REMOTE_ADDR'], 
                        'device' => $_SERVER['HTTP_USER_AGENT'], 
                    ];
                    $loghistory->insert($loginData);

                    Auth::authenticate($row);
                    redirect('home');
                } else {
                    $errors['errors'] = "Invalid email or password. Please try again.";
                }
            } else {
                $errors['errors'] = "Invalid email or password. Please try again.";
            }
        }

        $this->view('login', [
            'errors' => $errors
        ]);
    }
}

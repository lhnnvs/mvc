<?php

class Logs extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $x = new Log();
    $rows = $x->findAll('date DESC');
    $errors = [];

    if (count($_POST) > 0) {
      $_POST['date'] = date('Y-m-d H:i:s');
      $_POST['user'] = $_SESSION['USER']->firstname . ' ' . $_SESSION['USER']->lastname;

      if ($x->validate($_POST)) {
        $x->insert($_POST);
        redirect('logs');
      } else {
        $errors = $x->errors;
      }
    }

    $this->view('logs/index', [
      'logs' => $rows,
      'errors' => $errors
    ]);
  }
}

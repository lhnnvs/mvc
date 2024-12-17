<?php

class Loginhistory extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }
    $x = new Loghistory();
    $rows = $x->findAll('login DESC');

    $this->view('loginhistory', [
      'loginhistory' => $rows
    ]);
  }
}
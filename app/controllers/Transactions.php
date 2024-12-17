<?php

class Transactions extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }
    $this->view('transactions');
  }
}
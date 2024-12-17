<?php

class Lockers extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }
    $x = new Locker();
    $rows = $x->findAll();

    $this->view('lockers/index', [
      'lockers' => $rows
    ]);
  }

  public function create()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }
    $errors = [];
    $locker = new Locker();

    if (count($_POST) > 0) {

      if ($locker->validate($_POST)) {

        $locker->insert($_POST);

        redirect('lockers');
      } else {
        $errors = $locker->errors;
      }
    }

    $this->view('lockers/create', [
      'errors' => $errors
    ]);
  }

  public function edit($id)
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $x = new Locker();
    $arr['id'] = $id;
    $row = $x->first($arr);

    if (count($_POST) > 0) {

      $x->update($id, $_POST);

      redirect('lockers');
    }

    $this->view('lockers/edit', [
      'locker' => $row
    ]);
  }

  public function delete($id)
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $x = new Locker();
    $arr['id'] = $id;
    $row = $x->first($arr);

    if (count($_POST) > 0) {

      $destination = $row->image;

      if (unlink($destination)) {
        $x->delete($id);
      } else {
        $x->delete($id);
      }

      redirect('lockers');
    }

    $this->view('lockers/delete', [
      'locker' => $row
    ]);
  }
}
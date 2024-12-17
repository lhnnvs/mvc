<?php

class User extends Model
{
  public function validate($data)
  {
    $this->errors = [];
    if (empty($data['firstname']) || empty($data['lastname']) || empty($data['email']) || empty($data['password'])) {
      $this->errors['required_fields'] = "Please fill in all required fields.";
    }

    if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
      $this->errors['email'] = "Email is not valid.";
    }

    if (!empty($data['password']) && strlen($data['password']) < 8) {
      $this->errors['password'] = "Password must be at least 8 characters long.";
    }

    if (count($this->errors) == 0) {
      return true;
    } else {
      return false;
    }
  }
}

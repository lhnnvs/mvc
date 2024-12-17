<?php

class Log extends Model
{
  public function validate($data)
  {
    $this->errors = [];
    if (empty($data['log'])) {
      $this->errors['required_fields'] = "Please fill in required field.";
    }

    if (count($this->errors) == 0) {
      return true;
    } else {
      return false;
    }
  }
}

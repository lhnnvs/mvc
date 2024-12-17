<?php

class Loghistory extends Model
{
    public function validate($data)
    {
        $this->errors = [];

        if (count($this->errors) == 0) {
            return true;
        } else {
            return false;
        }
    }
}

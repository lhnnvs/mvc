<?php

function show($stuff)
{
  echo '<pre>';
  print_r($stuff);
  echo '</pre>';
}

function redirect($path)
{
  header("Location: " . ROOT . "/" . $path);
}

function get_var($key)
{
  if (isset($_POST[$key])) {
    return $_POST[$key];
  }
}

function get_select($key, $value)
{
  if (isset($_POST[$key])) {

    if ($_POST[$key] == $value) {
      return "selected";
    }
  }

  return "";
}

function random_string($length)
{
  $array = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

  $text = '';

  for ($i = 0; $i < $length; $i++) {
    $random = rand(0, 61);
    $text .= $array[$random];
  }
  return $text;
}

function time_ago($timestamp) {
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;

    $seconds = $time_difference;
    $minutes      = round($seconds / 60);
    $hours        = round($seconds / 3600);
    $days         = round($seconds / 86400);
    $weeks        = round($seconds / 604800);
    $months       = round($seconds / 2629440);
    $years        = round($seconds / 31553280); 
    if ($seconds <= 60) {
        return "Just now";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "One minute ago";
        } else {
            return "$minutes minutes ago";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "An hour ago";
        } else {
            return "$hours hours ago";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "Yesterday";
        } else {
            return "$days days ago";
        }
    } else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            return "A week ago";
        } else {
            return "$weeks weeks ago";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "A month ago";
        } else {
            return "$months months ago";
        }
    } else {
        if ($years == 1) {
            return "One year ago";
        } else {
            return "$years years ago";
        }
    }
}
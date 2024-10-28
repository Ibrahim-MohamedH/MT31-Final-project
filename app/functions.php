<?php

define("dashboard_url", 'http://localhost/realstate/dashboard/');

function dashboradURL($var = null)
{
  return dashboard_url . $var;
}
function dashboardPath($var)
{
  $location = dashboard_url . $var;
  echo "
  <script>
    window.location.replace('$location')
  </script>
  ";
}

function filterValidation($input_value)
{
  $input_value = trim($input_value);
  $input_value = strip_tags($input_value);
  $input_value = htmlspecialchars($input_value);
  $input_value = stripslashes($input_value);

  return $input_value;
}

function stringValidation($input_value, $min)
{
  $empty = empty($input_value);
  $length = strlen($input_value) < $min;

  if ($empty || $length) {
    return true;
  } else {
    return false;
  }
}
function imageSizeValidation($imageSize, $limitSize)
{
  $size = ($imageSize / 1024) / 1024;
  $isBigger = $size > $limitSize;
  if ($isBigger) {
    return true;
  } else {
    return false;
  }
}

function imageRequiredValidation($imageName)
{
  if (empty($imageName)) {
    return true;
  } else {
    return false;
  }
}

<?php

function checkNameController($cname) : bool {
  return (bool)preg_match('/^[a-z0-9]+$/', $cname);
}
<?php 
//simple page redirect
  function redirect(){
    header('location: ' . URLROOT . '/' . $page);
  }
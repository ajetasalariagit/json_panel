<?php 
require_once('config.php');
error_reporting(0);
session_start();

if(isset($_POST)){
    copy($_FILES['name']['tmp_name'],'jsonFiles/'.$_FILES['name']['name']);
    $data = file_get_contents('jsonFiles/'.$_FILES['name']['name']);
    $json_data = json_decode($data);
    $check = $collection->findOne();
    $id = $check->_id;
    $registration_no = $check->company_registration_number;
    if(empty($registration_no) && empty($id)){
        if ( $collection->insertMany($json_data) ) {
            $_SESSION['index'] = "<div class='alert alert-success' role='alert'>File uploaded successfully </div>";
            header("Location: index.php");
          }else{
            echo '<div class="alert alert-danger" role="alert">
            something went wrong
             </div>';
          }  
        }else{
            $_SESSION['index'] = "<div class='alert alert-danger' role='alert'>File already exists</div>";
            header("Location: index.php");
        } 
}
?>
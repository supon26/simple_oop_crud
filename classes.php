<?php

class Student{
    private $con = "";

    public function __construct(){
        $this->con = new mysqli('localhost','root','','batch_08');
    }

    public function insert($allData){

        $name   = $allData['name'];
        $reg    = $allData['reg'];
        $email  = $allData['email'];
        $phone  = $allData['phone'];
        $status = $allData['status'];


        if($name == ""){
            echo '<div class="text-center alert alert-danger">Name field is required</div>';
        }
        if($reg == ""){
            echo '<div class="text-center alert alert-danger">registration field is required</div>';
        }
        if($email == ""){
            echo '<div class="text-center alert alert-danger">Email field is required</div>';
        }
        if($phone == ""){
            echo '<div class="text-center alert alert-danger">Phone field is required</div>';
        }
        if($status == ""){
            echo '<div class="text-center alert alert-danger">Status field is required</div>';
        }
        else{
            $qur = $this->con->query("INSERT INTO tbl_student(name,reg,email,phone,status)VALUES('$name','$reg','$email','$phone','$status')");
            if($qur){
                echo "Data submited Successfully";
            }else{
                echo "Something went Wrong";
            }
        }
       
    }
    public function show(){
        $qur = $this->con->query("SELECT * FROM tbl_student");
        return $qur;
    }
    public function active($id){
        $qur = $this->con->query("UPDATE tbl_student SET status='2' WHERE id='$id'");
        header("location: index.php"); 
    }

    public function inactive($id){
        $qur = $this->con->query("UPDATE tbl_student SET status='1' WHERE id='$id'");
        header("location: index.php");
    }
    public function findForUpdate($id){
        $qur = $this->con->query("SELECT * FROM tbl_student WHERE id='$id'");
        return $qur;
    }
// ====================>

    public function update($allData,$id){
        $name   = $allData['name'];
        $reg    = $allData['reg'];
        $email  = $allData['email'];
        $phone  = $allData['phone'];
        $status = $allData['status'];


        if($name == ""){
            echo '<div class="text-center alert alert-danger">Name field is required</div>';
        }
        if($reg == ""){
            echo '<div class="text-center alert alert-danger">registration field is required</div>';
        }
        if($email == ""){
            echo '<div class="text-center alert alert-danger">Email field is required</div>';
        }
        if($phone == ""){
            echo '<div class="text-center alert alert-danger">Phone field is required</div>';
        }
        if($status == ""){
            echo '<div class="text-center alert alert-danger">Status field is required</div>';
        }
        else{
            $qur = $this->con->query("UPDATE tbl_student SET name='$name',reg='$reg',email='$email',phone='$phone',status='$status' WHERE id='$id'");
            if($qur){
                header("location: index.php");
            }else{
                echo "Something went Wrong";
            }
        }
    }
    public function delete($id){
        $qur = $this->con->query("DELETE FROM tbl_student WHERE id='$id'");
        if($qur){
            header("location: index.php");
        }
    }
}


?>
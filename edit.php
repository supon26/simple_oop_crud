<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4 border border-info rounded p-3">
                <?php
                include "classes.php";
                $clsObj = new Student;
                $id = $_GET['id'];
                $obj = $clsObj->findForUpdate($id);
                $allData = $obj->fetch_assoc();

                if(isset($_POST['btn'])){
                    $clsObj->update($_POST,$id);
                }
                
                ?>
                <form method="post">
                    <div class="form-group my-3">
                        <label for="name">Student Name :</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $allData['name']?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="reg">Registration Number :</label>
                        <input type="text" name="reg" id="reg" class="form-control" value="<?php echo $allData['reg']?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="email">Email :</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $allData['email']?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="phone">Phone :</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $allData['phone']?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="status">Status :</label>
                        <select name="status" id="status" class="form-control">
                            <option value="<?php echo $allData['status']?>">
                                <?php
                                
                                if($allData['status'] == 1){
                                    echo "Active";
                                }
                                else{
                                    echo "Inactive";
                                }
                                ?>
                            </option>
                            <option value="1">Active</option>
                            <option value="2">Inctive</option>
                        </select>
                    </div>
                    <div class="form-group my-3">
                        <button name="btn" class="btn text-white btn-info form-control">UPDATE DATA</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>


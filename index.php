<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 border border-info rounded p-3">
                <?php
                include "classes.php";
                $clsObj = new Student;
                if(isset($_POST['btn'])){
                    // $clsObj->insert($name,$reg,$email,$phone,$status);
                    // echo "<div class='text-center alert alert-danger'>".$clsObj->insert($_POST)."</div>";
                    $clsObj->insert($_POST);
                }

                if(isset($_GET['active'])){
                    $id = $_GET['active'];
                    $clsObj->active($id);
                }
                if(isset($_GET['inactive'])){
                    $id = $_GET['inactive'];
                    $clsObj->inactive($id);
                }

                if(isset($_GET['delete'])){
                    $id = $_GET['delete'];
                    $clsObj->delete($id);
                }
                
                ?>
                <form method="post">
                    <div class="form-group my-3">
                        <label for="name">Student Name :</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="reg">Student Registration Number :</label>
                        <input type="text" name="reg" id="reg" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="email">Email :</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="phone">Phone :</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="status">Status :</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">---- Select Status ----</option>
                            <option value="1">Active</option>
                            <option value="2">Inctive</option>
                        </select>
                    </div>
                    <div class="form-group my-3">
                        <button name="btn" class="btn btn-info form-control">Save</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table table-striped table-hover" border="1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Registration</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $all = $clsObj->show();
                        $sl = 1;
                        while($data = $all->fetch_assoc()){
                            if($data['status'] == 1){
                                $status = '<a href="index.php?active='.$data["id"].'" class="btn btn-info btn-sm">Active</a>';
                            }
                            else{
                                $status = '<a href="index.php?inactive='.$data["id"].'" class="btn btn-warning btn-sm">Inctive</a>';
                            }
                            echo "<tr>
                            <td>".$sl."</td>
                            <td>".$data['name']."</td>
                            <td>".$data['reg']."</td>
                            <td>".$data['email']."</td>
                            <td>".$data['phone']."</td>
                            <td>".$status."</td>
                            <td>
                            <a href='edit.php?id=".$data['id']."' class='btn btn-success btn-sm'><i class='fa fa-edit'></i></a>

                            <a href='index.php?delete=".$data['id']."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>
                            <button data-bs-toggle='modal' data-bs-target='#delete".$data['id']."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>
                            </td>
                            </tr>";
                            $sl++;

                            ?>

                            <!-- Modal -->
                            <div class="modal fade" id="delete<?php echo $data['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Massage</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-danger">Are You sure want to delete this item ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                                    <a href='index.php?delete=<?php echo $data['id'];?>' class='btn btn-danger btn-sm'>Yes</a>
                                </div>
                                </div>
                            </div>
                            </div>

                        <?php }                        
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>
<?php
require "vendor/autoload.php";
use App\Utils\DB;
$db = new DB;
$result = $db->show();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <div class="col-6 m-auto"> 
        <?php if($result):?>
        <?php foreach($result as $result): ?>
            <h3 class="mt-5 text-center">Edit Student who Student_ID : <?php echo $result["id"];?></h3>
            <form action="db_update.php" method="POST">
            <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $result["id"]; ?>" placeholder="">
                <div class="form-group mb-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $result["name"]; ?>" placeholder="Name">
                </div>
                <div class="form-group mb-2">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $result["email"]; ?>" placeholder="Email Address">
                </div>
                <div class="form-group mb-2">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="default" disabled class="form-select">Gender</option>
                        <option value="male" class="form-select" <?php if($result["gender"]=="male") echo "selected"; ?>>Male</option>
                        <option value="female" class="form-select" <?php if($result["gender"]=="female") echo "selected"; ?>>Female</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="date">Date of Birth</label>
                    <input type="Date" name="dob" class="form-control" value="<?php echo $result["dob"]; ?>" id="date" placeholder="">
                </div>
                <div class="form-group mb-2">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" class="form-control" value="<?php echo $result["age"]; ?>"  placeholder="">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Student</button>
                <a href="index.php" class="btn btn-danger mt-3">Cancel</a>
            </form>
        <?php endforeach ?>
        <?php else:?>
            <h3 class=" text-center text-danger">NO student found!</h3>
        <?php endif;?>
        </div>
    </div>
</body>
</html>
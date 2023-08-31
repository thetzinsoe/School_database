<?php
// die(var_dump($_GET['id']));
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
    <div class="text-center mt-3 fs-1">
        Student Detail
    </div>
    <div class="container mt-3">
        <div class="col-6 m-auto">
            <?php if($result):?>
                    <table class="table table-striped">
                        <?php foreach($result as $result): ?>
                            <tr>
                                <th class="">ID</th>
                                <td class="ms-3"><?php echo $result["id"]; ?></td>
                            </tr>
                            <tr>
                                <th class="">Name</th>
                                <td class="ms-3"><?php echo $result["name"]; ?></td>
                            </tr>
                            <tr>
                                <th class="">Email</th>
                                <td class="ms-3"><?php echo $result["email"]; ?></td>
                            </tr>
                            <tr>
                                <th class="">Gender</th>
                                <td class="ms-3"><?php echo $result["gender"]; ?></td>
                            </tr>
                            <tr>
                                <th class="">Dob</th>
                                <td class="ms-3"><?php echo $result["dob"]; ?></td>
                            </tr>
                            <tr>   
                                <th class="col-2">Age</th>
                                <td class="ms-3"><?php echo $result["age"]; ?> years old</td>
                            </tr>    
                        <?php endforeach ?>
                    </table>
                    <div class="col text-center">
                        <a href="index.php" class="btn btn-primary mt-2">Home</a>
                        <a href="db_read.php?id=<?php echo $result['id']; ?>" class="btn btn-primary mt-2">Edit</a>
                        <a href="db_destory.php?id=<?php echo $result['id']; ?>" class="btn btn-danger mt-2">Delete</a>
                    </div>   
            <?php else:?>
                <h4 class="text-danger text-center">No Student found!</h4>
            <?php endif;?>
        </div>
    </div>
</body>
</html>
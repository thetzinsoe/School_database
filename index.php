<?php
    require_once __DIR__."/vendor/autoload.php";
    use App\Utils\DB;

    // require_once "SRC/Utils/DB.php";
    // use Utils\DB;
    $db =  new DB;
    $result = $db->index();
    // var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        footer{
            color:red;
            position:fixed;
        }
    </style>
    <!-- <link rel="stylesheet" href=".././bootstrap/css/bootstrap.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="position-fixed bottom-0 start-0 text-secondary">
        School Management System &copy; 2023 | Develop by TZS &trade;
    </div>
    <div class="container mt-3" style="height: 1000px;">
        <a href="db_create.php" class="btn btn-primary mt-4">Create New Student</a>
        <hr>
        <div class="text-center mt-3 fs-1 mb-2">
            Students List Table
        </div>
        <div class="col-8 m-auto">
            <table class="table border table-striped table-primary">
                <thead>
                    <tr >
                        <th class="">ID</th>
                        <th class="">Name</th>
                        <th class="">Gender</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $result): ?>
                        <tr>
                            <td><?php echo $result["id"]; ?></td>
                            <td><?php echo $result["name"]; ?></td>
                            <td><?php echo $result["email"]; ?></td>
                            <td>
                                <a href="show.php?id=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm">Detail</a>
                                <a href="db_destory.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>                   
            </table>
        </div>
    </div>
</body>
</html>
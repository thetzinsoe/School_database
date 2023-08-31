<?php
    require "vendor/autoload.php";
    use App\Utils\DB;
    $db = new DB;
    $return_value = $db->store();
    // die(var_dump($_POST));
    // die(var_dump($return_value));
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
    <?php if($return_value == "error"):?>
        <br>
        <a href="db_create.php" class="btn btn-primary m-5 btn-lg">&LeftAngleBracket;&LeftAngleBracket; Back</a>
    <?php endif;?>
    <button onclick="click()">Click</button>

</body>
</html>
<?php 
echo '<script type="text/javascript">
function click(){
console.log("My name is mg mg");
}
</script>';
?>
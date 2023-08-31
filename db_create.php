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
    <div class="container col-6">
    <h3 class="mt-5">Create New Student</h3>
    <form action="store.php" method="POST">
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group mb-2">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
        </div>
        <div class="form-group mb-2">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control">
                <option value="default" disabled selected class="form-select">Gender</option>
                <option value="male" class="form-select">Male</option>
                <option value="female" class="form-select">Female</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="date">Date of Birth</label>
            <input type="Date" name="dob" class="form-control" id="date" placeholder="">
        </div>
        <div class="form-group mb-2">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" class="form-control" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create New Student</button>
        <a href="index.php" class="btn btn-danger mt-3">Cancel</a>
    </form>
    </div>
</body>
</html>
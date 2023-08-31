<?php
namespace App\Utils;
use PDO;
use PDOException;
class DB
{
    private $pdo;
    public function __construct()
    {
        try{
            $this->pdo = new PDO("mysql:dbname=school;host=localhost",'root','tzs5123');
        } catch(PDOException $e){
            echo $e->getMessage().$e->getCode();
        }
    }
    public function index()
    {
        // die(var_dump("I am Okay."));
        try{
            
        } catch(PDOException $e){
            echo $e->getMessage().$e->getCode();
        }
        $statement = $this->pdo->query("
        select * from students
        ");
            if($statement)
            {
                // $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                $result = $statement->fetchAll();
                return $result;
            }
    } 
    public function show()
    {
        try{
            $statement = $this->pdo->prepare("
            select * from students where id=:id
            ");
            $statement->bindParam(":id",$_GET["id"]);
                if($statement->execute())
                {  
                    $result = $statement->fetchAll();
                    // foreach($result as $result){
                    //     echo "<p>{$result["id"]} - {$result["name"]} : age- {$result["age"]}</p>";
                    // }
                return $result;
                }   
        } catch(PDOException $e){
            echo $e->getMessage().$e->getCode();
        }
    }
    public function store()
    {
        try{
            $statement = $this->pdo->prepare("
            INSERT INTO `students` (`name`,`email`,`gender`,`dob`,`age`)
            VALUES( :name, :email, :gender, :dob, :age)   
            ");
                $statement->bindParam( ":name", $_POST['name']);
                $statement->bindParam( ":email", $_POST['email']);
                $statement->bindParam( ":gender", $_POST['gender']);
                $statement->bindParam( ":dob", $_POST['dob']);
                $statement->bindParam( ":age", $_POST['age']);
            if($statement->execute()){
                // die(var_dump($pdo->lastInsertId()));
                $student_id=$this->pdo->lastInsertId();
                header("location: db_read.php?id={$student_id}");
                // header("location:index.php");
            }  
        } catch(PDOException $e){
            echo $e->getMessage().$e->getCode();
            return "error";
        }
    }
    public function update()
    {
        try{
            // die(var_dump($_POST));
            $statement = $this->pdo->prepare("
            UPDATE `students` SET `name`=:name,`email`=:email,`gender`=:gender,`dob`=:dob,`age`=:age where id=:id
            ");
            $statement->bindParam(":id",$_POST['id']);
            $statement->bindParam( ":name", $_POST['name']);
            $statement->bindParam( ":email", $_POST['email']);
            $statement->bindParam( ":gender", $_POST['gender']);
            $statement->bindParam( ":dob", $_POST['dob']);
            $statement->bindParam( ":age", $_POST['age']);
            $statement->execute();
            // var_dump($statement);
            if($statement){
                header("location:index.php");
            }  
        } catch(PDOException $e){
            echo $e->getMessage().$e->getCode();
            return "error";
        }
    }
    public function destory()
    {
        try{
            $statement = $this->pdo->prepare("
            DELETE from `students` where id=:id
            ");
            $statement->bindParam(":id",$_GET["id"]);
            // var_dump($statement);
            if($statement->execute()){
                header("location:index.php");
            }
            
        } catch(PDOException $e){
            echo $e->getMessage().$e->getCode();
        }   
    }
}
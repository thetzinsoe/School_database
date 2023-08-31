<?php
namespace Utils;

use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Database\Capsule\Manager as Database;
use Illuminate\Database\Query\Expression as QueryExpression;
use Illuminate\Database\QueryException;
use LDAP\Result;

class DB
{
    public function __construct()
    {
        $students = new Database();

        $students->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'school',
            'username' => 'root',
            'password' => 'tzs5123',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $students->setAsGlobal();
        $result = $students::table('students')->get();
        return $result;
    }
    public function index()
    {
        return Database::table('students')->get();
    }
    public function show()
    {
        return Database::table('students')->where("id",$_GET["id"])->get();
    }
    public function update()
    {
        try{
            $result = Database::table('students')->where("id" , $_POST["id"])
            ->update([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'gender' => $_POST['gender'],
                'dob' => $_POST['dob'],
                'age' => $_POST['age']
            ]);
            // dd($result);
            if($result)
            {
                header("location:index.php");
            }else
            {
                return "nochange";
            }
        }catch (QueryException $e){
            echo $e->getMessage();
            return "invalid";
        }
    }
    public function destory()
    {
        $result = Database::table('students')->where("id",$_GET['id'])->delete();
        if($result)
        {
            header("location:index.php");
        }
    }
    public function store()
    {
        try{
            $result = Database::table('students')->insertGetId([
                'name' => $_POST['name'],
                 'email' => $_POST['email'],
                 'gender' => $_POST['gender'],
                 'dob' => $_POST['dob'],
                 'age' => $_POST['age']
             ]);
             if($result)
             {
                 header("location:db_read.php?id=$result");
             }
        }catch (QueryException $e) {
            echo $e->getMessage();
            return "error";
        }
    }
}
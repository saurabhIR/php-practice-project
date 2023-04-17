<?php
namespace App\Models;

use App\Controllers\Logout;
use \Core\View;

/**
 * creating functions for user to use
 */
class User extends \Core\Model{
    protected $email;
    protected $password;
    public $session_email;
    public $question_title;
    public $question_description;
    public $question_interest;

    public $errors = [];

    public function __construct($data =[]){
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Summary of save 
     * this fucntion will save new user's data in the database
     * @return \mysqli_result|bool
     */
    public function save(){
        // $this->validate();
        if (empty($this->errors)) {
        
        $db = self::getDB();
        $email = mysqli_real_escape_string($db, $this->email);
        $password = mysqli_real_escape_string($db, $this->password);
        // Query MySQL database
        $query = "SELECT * FROM users WHERE username='$email' AND password='$password'";
        $result = mysqli_query($db, $query);

        // Check if a match is found
        if(mysqli_num_rows($result) > 1) {
            echo "Email address already exists";
        }
        else{
        // insert data into 'users' table
        $sql_users = "INSERT INTO users (username, password) VALUES ('$email', '$password');";

        // execute queries
        if (mysqli_query($db, $sql_users)) {
            echo "New record created successfully<br>";
            echo "<a href='/login/new'>Click Here to Login</a>";
        } else {
            echo "Error: " . $sql_users . "<br>" . mysqli_error($db);
        }
        }

       return mysqli_query($db, $query);
        }
        return false;
    }


    /**
     * Summary of Logout this fucntion will destory session
     * @return bool
     */
    public  function Logout(){
          //to ensure you are using same session
    session_unset();
    session_destroy(); //destroy the session
    if (session_status() === PHP_SESSION_NONE) {
        return true;
    } else {
        return false;
    }
}

    /**
     * Summary of findByEmail this fucntion will check whether email password is correct or not
     * @param mixed $email
     * @param mixed $password
     * @return array|bool|null
     */
    public static function findByEmail($email,$password)
    {   echo"hii";
        $db = static::getDB();
        $email = mysqli_real_escape_string($db, $email);
        $password = mysqli_real_escape_string($db, $password);
        $sql = "SELECT * FROM users WHERE username='$email' AND password='$password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        if(isset($row)){
            //session_start();
            $_SESSION['username'] = $email;
            
        }
        return $row;
    }

    /**
     * Summary of question_post this function will add queston in the database
     * @return 
     */
    public function appPost($data =[] , $file =[]){
        if (empty($this->errors)) {
            $db = self::getDB();
            $app_name = mysqli_real_escape_string($db, $_POST['name']);
            $app_description = mysqli_real_escape_string($db,  $_POST['description']);
            $app_developer = mysqli_real_escape_string($db,  $_POST['developer']);
            //moving image to images folder
            $file_name=$_FILES['photo']['name'];
            $file_tmp_name=$_FILES['photo']['tmp_name'];
            move_uploaded_file($file_tmp_name, "images/".$file_name);
            //moving txt file to the downloadFile
            $text_name=$_FILES['text-file']['name'];
            $text_tmp_name=$_FILES['text-file']['tmp_name'];
            move_uploaded_file($text_tmp_name, "downloadFile/".$text_name);
            $query = "INSERT INTO apps(app_name,description,image,developer) VALUES ('$app_name', '$app_description','/images/$file_name ','$app_developer')";
            return mysqli_query($db, $query);
        }
    }

    /**
     * Summary of question_view this will show all the questions in the feed
     * @return array
     */
    public function feedView(){
        if (empty($this->errors)) {
        $db = self::getDB();
        $sql = "SELECT * FROM apps";
        $result = mysqli_query($db, $sql);
        $arr=[];
        while ($row = $result->fetch_assoc()){
            $arr[]=$row;
        }
        return $arr;
        }
    }
    /**
     * Summary of user_profile this will show logged in user's data
     * @return array
     */
    public function user_profile(){
        if (empty($this->errors)) {
        $db = self::getDB();
        $session_email = $_SESSION['username'];
        $sql = "SELECT * FROM apps";
        $result = mysqli_query($db, $sql);
        $arr=[];
        while ($row = $result->fetch_assoc()){
            $arr[]=$row;
        
        }
        return $arr;
        }
    }

    /**
     * Summary of view_question will show a question with post id
     * To view a particular question
     * @param mixed $post_id
     * @return array|bool|null
     */
    public function appView($post_id){
        if (empty($this->errors)) {
        $db = self::getDB();
        $sql = "SELECT * FROM apps WHERE app_id='$post_id' ";
        $result = mysqli_query($db, $sql);
        $row = $result->fetch_assoc();
        return $row;
        }
    }

    /**
     * Summary of edit_question update question in database
     * @param mixed $post_id
     * @return \mysqli_result|bool
     */
    public function appEdit($data =[] , $file =[],$post_id){
        if (empty($this->errors)) {
            $db = self::getDB();
            $app_name = mysqli_real_escape_string($db, $_POST['name']);
            $app_description = mysqli_real_escape_string($db,  $_POST['description']);
            $app_developer = mysqli_real_escape_string($db,  $_POST['developer']);
            //moving image to images folder
            $file_name=$_FILES['photo']['name'];
            $file_tmp_name=$_FILES['photo']['tmp_name'];
            move_uploaded_file($file_tmp_name, "images/".$file_name);
            //moving txt file to the downloadFile
            $text_name=$_FILES['text-file']['name'];
            $text_tmp_name=$_FILES['text-file']['tmp_name'];
            move_uploaded_file($text_tmp_name, "downloadFile/".$text_name);
            $sql="UPDATE apps SET app_name='$app_name',description='$app_description',image='/images/$file_name', developer='$app_developer' WHERE apps.app_id='$post_id';";
        return mysqli_query($db, $sql);
        }
    }

    /**
     * Summary of appDelete this will delete row of a particular id
     * @param mixed $post_id
     * @return \mysqli_result|bool
     */
    public function appDelete($post_id){
        if (empty($this->errors)) {
        $db = self::getDB();
        $sql = "DELETE FROM apps WHERE app_id = '$post_id'";
        return mysqli_query($db, $sql);
        }
    }

    /**
     * Summary of Emailfinder will find email in data 
     * @param mixed $email
     * @return array|bool|null
     */
    public static function Emailfinder($email)
    {
        $db = static::getDB();
        $email = mysqli_real_escape_string($db, $email);
        $sql = "SELECT * FROM users WHERE username='$email'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    /**
     * Summary of rateApp
     * @param mixed $app_id
     * @return \mysqli_result|bool
     */
    public static function rateApp($app_id){        
        $db = static::getDB();
        $review_text=  mysqli_real_escape_string($db,$_POST['review_text']);
        $rating=mysqli_real_escape_string($db,$_POST['rating']);
        $session_email=$_SESSION['username'];
        $sql = "INSERT INTO app_reviews (app_id,username,review_text,rating) VALUES ('$app_id', '$session_email', '$review_text', '$rating');";
        $result = mysqli_query($db, $sql);
        return $result;
    }
    /**
     * Funtion to show reviews and rating of the app
     * @param mixed $app_id
     * 
     */
    public function appRatings($app_id){
        $db = static::getDB();
        $sql = "SELECT * FROM app_reviews WHERE app_id='$app_id'";
        $result = mysqli_query($db, $sql);
        $arr=[];
        while ($row = $result->fetch_assoc()){
            $arr[]=$row;
        }
        return $arr;
    }


    /**
     * Summary of updateDownloadCount
     * @param mixed $post_id
     * @return \mysqli_result|bool
     */
    public function updateDownloadCount($post_id){
        $db = static::getDB();
        $sql = "UPDATE `apps` SET `download_count` = `download_count` + 1  WHERE `app_id`=$post_id";
        return mysqli_query($db, $sql);
    }
  
    public function userApps($post_id){
        $db = static::getDB();
        $session_email = $_SESSION['username'];
        $query= 'SELECT * FROM app_installed WHERE app_id=`$post_id` and username=`$session_email`';
        $result = mysqli_query($db, $query);
        if ($result->fetch_assoc()==1){
            return false;
        }
        else{
            $sql = 'INSERT INTO app_installed (app_id,username) VALUES ("$post_id","$session_email")';
            return mysqli_query($db, $sql);
        }

    }
}
?>
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
    {
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
     * @return void
     */
    public function question_post(){
        if (empty($this->errors)) {
        $db = self::getDB();
        $session_email = $_SESSION['username'];
        $question_title = mysqli_real_escape_string($db, $this->question_title);
        $question_description = mysqli_real_escape_string($db, $this->question_description);
        $question_interest = mysqli_real_escape_string($db, $this->question_interest);
            $query = "INSERT INTO questions(username,title,description,interest) VALUES ('$session_email', '$question_title', '$question_description', '$question_interest')";
            if(mysqli_query($db, $query)){
                echo "New question created successfully<br>";
            }
            else {
                echo "Error: " . $$query . "<br>" . mysqli_error($db);
            }
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
    public function edit_question($post_id){
        if (empty($this->errors)) {
        $db = self::getDB();
        $question_title = mysqli_real_escape_string($db, $this->question_title);
        $question_description = mysqli_real_escape_string($db, $this->question_description);
        $question_interest = mysqli_real_escape_string($db, $this->question_interest);
        $sql="UPDATE questions SET title='$question_title',description='$question_description',interest='$question_interest' WHERE questions.id='$post_id';";
        $result = mysqli_query($db, $sql);
        return mysqli_query($db, $sql);
        }
    }

    /**
     * Summary of delete_question this will delete row of a particular id
     * @param mixed $post_id
     * @return \mysqli_result|bool
     */
    public function delete_question($post_id){
        if (empty($this->errors)) {
        $db = self::getDB();
        $sql = "DELETE FROM questions WHERE id = '$post_id'";
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
}
?>
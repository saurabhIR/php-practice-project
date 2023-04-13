<?php
namespace App\Controllers;

use \Core\View;
use \App\Models\User;

/**
 * Summary of Signup
 * functions to register user
 */
class Signup extends \Core\Controller
{
    /**
     * Summary of newAction
     * renders signup form
     * @return void
     */
    public function newAction(){
        View::render('Signup/new.php');
    }
    
    /**
     * Summary of createAction
     * Add user's details in the database
     * @return void
     */
    public function createAction(){
        $user = new User($_POST);
        if($user->save()) {
            header('Location: /Signup/success');
        }
        else{
            View::render('Signup/new.php',[
                'user' => $user
            ]);
        }
    }

    /**
     * Summary of successAction
     * renders to new page if successfully signed up
     * @return void
     */
    public function successAction(){
        View::render('Signup/success.php');
    }

}
?>
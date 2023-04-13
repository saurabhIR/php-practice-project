<?php
namespace App\Controllers;

use \Core\View;
use App\Models\User;

/**
 * Summary of Userprofile
 * functions to show user's personal questions and data
 */
class Userprofile extends \Core\Controller
{
  // /**
  //  * Summary of newAction
  //  * renders user profile page
  //  * @return void
  //  */
  // public function newAction(){
  //   View::render('Userprofile/new.php');
  // }

  /**
   * Summary of createAction
   * renders user profile page
   * @return void
   */
  public function createAction(){
    if(isset($_SESSION['username'])){
      $user = new User();
      $row=$user->user_profile();
      if($row) {
          View::render('/Userprofile/new.php',[
              'row' => $row
          ]); 
      }
      else{
          View::render('/Feed/view.php',[
              'user' => $user
          ]);
      }
    }
    else{
      header('Location: /Login/new');
    }
  }

}
?>
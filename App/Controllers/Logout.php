<?php
namespace App\Controllers;

use \Core\View;
use App\Models\User;

/**
 * Summary of Logout
 * class have function to destory session
 */
class Logout extends \Core\Controller
{

    /**
     * Summary of newAction
     * function to destroy session
     * @return void
     */
    public function newAction(){
      $user = new User;
      if($user->Logout()) {
        echo "hi";
        header('Location: /Login/new');
      }
      else{
        echo "error";
      }
    }
  }


?>
<?php
namespace App\Controllers;

use \Core\View;
use App\Models\User;

/**
 * Summary of Feed
 * this class is using to edit and delete questions to user in feed 
 */
class Edit extends \Core\Controller
{
    /**
     * Summary of newAction
     * Function to get the question which has to edit
     * @return void
     */
    public function newAction(){
      $post_id = $_GET['id'];
      $user = new User();
      $row=$user->view_question($post_id);
      if($row) {
          View::render('Edit/new.php',[
              'row' => $row
          ]); 
      }
    }
    /**
     * Summary of createAction
     * This function will update the question in database
     * @return void
     */
    public function createAction(){
      $user = new User($_POST);
      $post_id = $_GET['id'];
      if($user->edit_question($post_id)) {
          header('Location: /Feed/view');
      }
      else{
          View::render('/Feed/new.php',[
              'user' => $user
          ]);
      }
    }

    /**
     * Summary of deleteAction
     * This function will delete the question from database
     * @return void
     */
    public function deleteAction(){
      $post_id = $_GET['id'];
      $user = new User();
      $row=$user->delete_question($post_id);
      if($row) {
        header('Location: /Feed/view');
      }
    }
  }
?>
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
      $row=$user->appView($post_id);
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
      $user = new User();
      $post_id = $_GET['id'];
      if($user->appEdit($_POST,$_FILES,$post_id)) {
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
      $row=$user->appDelete($post_id);
      if($row) {
        header('Location: /Feed/view');
      }
    }

    public function downloadAction(){
      $post_id = $_POST['app_id'];
      $user = new User();
      //Calling funtion to update download count
      $row=$user->updateDownloadCount($post_id);
      //Calling funtion to download app
      $file_path = 'downloadFile/'. $post_id.".txt";
      if (file_exists($file_path)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $post_id . '"');
        readfile($file_path);
      }
    }
  }
?>
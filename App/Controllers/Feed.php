<?php
namespace App\Controllers;

use \Core\View;
use App\Models\User;

/**
 * Summary of Feed
 * to show questions in the feed
 */
class Feed extends \Core\Controller
{

		public function newAction(){
				if(isset($_SESSION['username'])){
						View::render('Feed/new.php');
				}
				else{
						header('Location: /Login/new');
				}
		}

		/**
		 * Summary of createAction
		 * To create a new question post
		 * @return void
		 */
		public function createAction(){
			
			$user = new User();
			if($user->appPost($_POST,$_FILES)) {
					header('Location: /Feed/view');
			}
			else{
					View::render('/Feed/new.php');
			}
		}

		/**
		 * Summary of viewAction
		 * showing all the quesrtion on clicking show questions
		 * @return void
		 */
		public function viewAction(){
				// session_start();
				$user = new User($_POST);
				$row=$user->feedView();
				if($row) {
						View::render('/Feed/viewpost.php',[
								'row' => $row
						]); 
				}
				else{
						View::render('/Feed/new.php',[
								'user' => $user
						]);
				}
		}

		/**
		 * On clicking question a new tab of question and answer is showing
		 * @return void
		 */
		public function appAction(){
			if (isset($_SESSION['username'])){
				$app_id = $_GET['id'];
				$user = new User();
				$row=$user->appView($app_id);
				$reviews=$user->appRatings($app_id);
				if($row) {
						View::render('/Feed/viewApp.php',[
								'row' => $row,'reviews'=>$reviews
						]); 
				}
				else{
						View::render('/Feed/viewpost.php',[
								'user' => $user
						]);
				}
			}
			else{
				header('Location: /Login/new?please_login_first');
			}
		}
		
		
	}
	?>
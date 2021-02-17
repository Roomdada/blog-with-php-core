<?php





if(isset($_POST['send']))
{
	extract($_POST);
	if (!empty($name) && !empty($comment)) {
		  require('function.php');
		  $article_id = intval($article_id);
	      $response = createComment($name,$comment,$article_id);
	      header("Location: success.php");
		
	}

}


?>
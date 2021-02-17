<?php

require('config/db.php');

function getAllCategory()
{
	global $db;
	$data  = $db->prepare("SELECT * FROM category");
	$data->execute();
	$categories = $data->fetchAll();
	return $categories;
}


function getAllArticle($id)
{
   global $db;
   $request = $db->prepare('SELECT * FROM article where category_id = ?');
   $request->execute([$id]);
   $data = $request->fetchAll(PDO::FETCH_OBJ);
   return $data;

}



function getComment(int $id) 
{
	require('db.php');

	$request = $db->prepare('SELECT * FROM comment where article_id = ?');
	$request->execute([$id]);
	$data = $request->fetchAll(PDO::FETCH_OBJ);
	return $data;

}


function getArticle(int $id)
{
	require('db.php');
	$request = $db->prepare('SELECT * FROM article where id = ?');
	$request->execute([$id]);
	$data = $request->fetch(PDO::FETCH_OBJ);

	return $data;
}



function createComment(string $name,string $comment,int $article_id)
{
    require('db.php');
    $request = $db->prepare('INSERT INTO comment(name,comment,article_id) VALUES(?, ?, ?)');
    $val = $request->execute([$name,$comment,$article_id]);
    return $val;

}


?>



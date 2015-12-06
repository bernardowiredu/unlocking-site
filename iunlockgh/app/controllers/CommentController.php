<?php


class CommentController extends BaseController {

public function postComments(){

	$posted = Input::get();

	$comment = new Comment;

	$comment->username = $posted['username'];
	$comment->comments = $posted['comments'];
	$comment->location = $posted['location'];
	$comment->date = $posted['date'];
	$comment->time = $posted['time'];

	$comment->save();

}





}

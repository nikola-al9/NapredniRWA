<?php
  class ContactController {
    public function index() {
      // we store all the posts in a variable
      $contact = Contact::all();
      require_once('views/contact/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $contact = Contact::find($_GET['id']);
      require_once('views/contact/show.php');
    }
	public function deletecontact() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $contact = Contact::deletecontact($_GET['id']);
      require_once('views/contact/delete.php');
    }
  }
?>
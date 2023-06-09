<?php
  class CustomersController {
    public function index() {
      // we store all the posts in a variable
      $customers = Customer::all();
      require_once('views/customer/index.php');
    }

    public function find() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $customer = Customer::find($_GET['id']);
      require_once('views/customer/find.php');
    }
  }
?>
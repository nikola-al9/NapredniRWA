<?php
  class Customer {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $CustomerID;
    public $AccountNumber;
    public $CustomerType;

    public function __construct($CustomerID, $AccountNumber, $CustomerType) {
      $this->CustomerID      = $CustomerID;
      $this->AccountNumber  = $AccountNumber;
      $this->CustomerType = $CustomerType;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM customer');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $customer) {
        $list[] = new Customer($customer['CustomerID'], $customer['AccountNumber'], $customer['CustomerType']);
      }

      return $list;
    }

    public static function find($CustomerID) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $CustomerID = intval($CustomerID);
      $req = $db->prepare('SELECT * FROM customer WHERE CustomerID = :CustomerID');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('CustomerID' => $CustomerID));
      $customer = $req->fetch();

      return new Customer($customer['CustomerID'], $customer['AccountNumber'], $customer['CustomerType']);
    }
  }
?>
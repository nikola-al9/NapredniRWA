<?php
  class Address {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $AddressID;
    public $AddressLine1;
    public $City;

    public function __construct($AddressID, $AddressLine1, $City) {
      $this->AddressID      = $AddressID;
      $this->AddressLine1  = $AddressLine1;
      $this->City = $City;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM address');


      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Address($post['AddressID'], $post['AddressLine1'], $post['City']);
      }

      return $list;
    }

    public static function find($AddressID) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $AddressID = intval($AddressID);
      $req = $db->prepare('SELECT * FROM address WHERE AddressID = :AddressID');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('AddressID' => $AddressID));
      $post = $req->fetch();

      return new Address($post['AddressID'], $post['AddressLine1'], $post['City']);
    }
  }
?>
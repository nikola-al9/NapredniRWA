<?php
  class Contact  {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $FirstName;
    public $LastName;


    public function __construct($FIRSTNAME, $LASTNAME) {
      $this->FirstName      = $FIRSTNAME;
      $this->LastName  = $LASTNAME;

    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM CONTACT');


      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $contact) {
        $list[] = new Contact($contact['FirstName'], $contact['LastName']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM CONTACT WHERE FirstName = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $contact = $req->fetch();

      return new Contact($contact['FirstName'], $contact['LastName']);
    }
	
	public static function deletecontact($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      //$id = intval($id);
	  $sql="DELETE FROM CONTACT WHERE FirstName ='$id'";
	  //echo $sql;
	  
      //$req = $db->prepare($sql);
      // the query was prepared, now we replace :id with our actual $id value
      //if ($req->execute(array('id' => $id))){
		  //$req=$r->execute($sql);
	if ($db->query($sql) == TRUE){
	//if (1==2){
		  $rez="USPJESNO brisanje";
	  }
		  else {
			 $rez="NESPJESNO brisanje";;
		  }
		  return $rez;
	  
}
  }
?>
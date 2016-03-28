<?php

class DBOperationsHandler{
  protected $servername;
  protected $username;
  protected $password;
  protected $dbname;
  protected $conn;

  function __construct(){
    $this->servername = 'localhost';
    $this->username = 'webuser';
    $this->password = 'pass@word1';
    $this->dbname = 'webdata';

    // Create connection
    $this->conn = mysql_connect($this->servername, $this->username, $this->password, $this->dbname);

    //set DB
    mysql_select_db($this->dbname);

    // Check connection
    if (!$this->conn) {
        die("Connection failed: " . $conn->connect_error);
    }
  }

  function __destruct(){
    mysql_close($this->conn);
  }

  function insertCustomerDetails($username_,$email_,$axid_,$reg_date_,$md5password_){
    // sql statement
    $sql = "insert into Users(username,email,axid,reg_date,md5password)
            values('$username_','$email_','$axid_','$reg_date_','$md5password_')";

    $retval = mysql_query( $sql, $this->conn);

    if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
    }
    echo "Entered data successfully\n";

  }

  function checkEmailIsAlreadyUsed($emailAddress_){
    $retval = $this->findUserByEmail($emailAddress_);

    if($retval != null) {
      return true;
    }
    return false;
  }

  function findUserByEmail($emailAddress_){
    $sql = "select * from Users
            where email = '$emailAddress_'";

    $retval = mysql_query( $sql, $this->conn);

    if(mysql_num_rows($retval) > 0) {
      return $retval;
    }
    return null;
  }
}
?>

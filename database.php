<?
require_once('authenticator.php');
require_once('logger.php');

/**
 * Helper class containing various database methods
 */
class DatabaseHelper{
  private $mysql;
  private $query;
  
  /**
   * Constructor method that initialise database connection
   * 
   */
  function DatabaseHelper(){
    // Open connect to database
    try {
        $this->mysql = $this->connect();
    } catch (Exception $e) {
        $logger = new Logger();
        $logger->setLog('error');
    }
    
  } 
  
  /**
   * Select the database and connect to it using given parameters
   * 
   * @return resource $mysql Successfully connected MySQL database resource 
   */
  private function connect(){
    // Connect and select database
    # @TODO Replace error message with redirect + log + email notification 
    $host = 'localhost';
    $database = $user = 'blake_shame';
    $password = 'Ch4ng3m3#';
    
    if(!$password)
      throw new Exception('No password set for database');
    
    $mysql = @mysql_connect($host,$user,$password);
    if(!$mysql)
      throw new Exception('Uh oh');
                
    # @TODO Replace error message with redirect + log + email notification
    mysql_select_db($database) 
        or die('Could not select database');
    
    return $mysql;
  }
  
  /**
   * Inserts a single row of data into database based on parameters 
   * given and redirect user on success/failure with message/error 
   * in URL parameter
   *    
   * @param string $table Name of table to insert new row into
   * @param array $formData Array of data to insert into new row of table
   * @param string $successMessage Message attached to success URL
   * 
   * @TODO Replace switch with default of 'manage-'.$table, if $redirect param not supplied
   */
  public function insert($table, $formData, $successMessage) {
    switch($table){
      case 'shames':
        $section = 'manage-shames';
        break;
      case 'users':
        $section = 'manage-users';
        break;
      case 'websites':
        $section = 'manage-websites';
        break;
        
      default:
        $section = '';
    }
    
    foreach($formData as $key => $value){
      $values[] = $value;
      $keys[] = $key;
    }
  
    $sql = "INSERT INTO `$table` (".implode(',',$keys).") VALUES('".implode("','",$values)."')";
    $query = mysql_query($sql, $this->mysql);
    
    if($query)
      header( "Location: /$section/?success=$successMessage" );
    
    header( "Location: /$section/?error=" . mysql_error() );
  }
  
  /**
   * Enables updates to specific data regarding in the database for a given 
   * table
   * 
   * @param string $table Name of table to update row in
   * @param array $formData Array of data to insert into specified row
   * @param int $id ID of row to update data within specified table
   * 
   * @TODO Write update method
   */
  public function update($table, $formData, $id){}

  /**
   * Removes a row of a given table based on the given parameters
   * 
   * @param string $table Name of table to remove row from
   * @param int $id ID of row to remove from table
   * 
   * @TODO Write remove method
   */
  public function remove($table, $id){}
  
  /**
   * Returns all the rows from the table given as a parameter
   * 
   * @param string $table Name of table to fetch data from
   * @return array Array of rows from given table
   */
  public function getAllByTableName($table) {
    if(!isset($table)){
      return false; 
    }
    
    return $this->queryRows("SELECT * FROM `$table`");
  }
  
  /**
   * Fetches a single row from a table specified in the given SQL
   * 
   * @param string $sql SQL to run against connected database
   * @return array $row Row matched by the given SQL statement
   */
  public function queryRow($sql = '') {
    //$this->query = ($this->query) ? $this->query : mysql_query($sql, $this->mysql);
              
    if( !isset($this->query) ){
      # @TODO Replace error message with redirect + log + email notification 
      $this->query = mysql_query($sql, $this->mysql)
          or die('Query failed: ' . mysql_error());
    }
    
    $row = mysql_fetch_assoc($this->query);
    return $row;
  }
  
  # @TODO Document DatabaseHelper->queryRows()
  public function queryRows($sql = ''){
    $result = array();
    
    while( $row = $this->queryRow($sql) ){
      $result[] = $row;
    }
    
    $this->query = null;
    return $result;
  }
}
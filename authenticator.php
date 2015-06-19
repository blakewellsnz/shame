<?
session_start();
require_once('database.php');

/**
 *  Authentication Helper Class 
 * 
 *  @TODO Document Authenticator Class & Methods
 */
 

class AuthenticatorHelper{
    private $db;
    
    
    /**
     * Constructor method: creates a new database helper and connects to the database and creates a new session if
     * a user has logged in.
     * @param string $username
     * @param string $password
     * @param string $user
     */
     
    function AuthenticatorHelper(){
        $this->db = new DatabaseHelper();
        
        if($_POST['login']){
            $username = $_POST['login']['username'];  // Username submitted to form
            $password = $_POST['login']['password'];  // Password submitted to form
        
        if( $user = $this->login($username,$password) ){
            // $user being a user db row
            $_SESSION['user'] = $user;
        }else{
            // user/pass failed
            die('failed login');
            $this->logout();
        }
            }
        
        if($_GET['logout']){
                $this->logout();
            }
    } //end of the function
    
    /**
     *  User login checks to see if the parameters given are the same as the parameters in the database
     * @param string $username Username as given in the database table
     * @param string $password Password in the same row as the previous username in the database table
     */
        function login($username, $password){
            
            //Build query to find all users
            $sql = "SELECT * FROM users WHERE username = '$username'";
            /*
            mysql_query($mysql) 
                or die('Query failed: ' . mysql_error());*/
            
            // Run query to find specific user
            if( $result  = $this->db->queryRow($sql) ){
                if( $result['password'] == $password ){
                    $_SESSION['username'] = $username;
                    $_SESSION['loggedIn'] = true;
                }else{
                    $result = false;
                }
            }
            
            
            return $result;
        }// end of the function
        
        /**
         * User logout, destroys session and redirects user to index.php
         */
        function logout(){
            session_destroy();
            header('Location: index.php');
        }
        
        /**
         * Authentication Helper Functions 
         */
         
         
         /**
          * Checks to see if user is authenticated
          */
        function isAuthenticated(){
            return $_SESSION['loggedIn'];
        }
        
        
        /**
         *  If user is unauthenticated this logs them out
         */
        function redirectUnauthenticatedUser(){
            if( !$this->isAuthenticated() )
                $this->logout(); 
        }
}// end of the class 








<?
require_once('authenticator.php');

/**
 * Provides logging functionality including recording errors, sending 
 * error/notifications emails and display error/notification messages to 
 * the user
 */
class Logger{
  private $type;
  private $message;
  private $db;
  private $IP;
  private $user;
  
  private $emailTo;
  private $emailSubject;
  private $emailHeaders;
  public $lastEmailSent;
  /**
   *
   */
  public function Logger(){
    $this->emailTo = 'blake@blakewells.io';
    $this->emailSubject = 'TEST';
    //$this->emailHeaders = "MIME-Version: 1.0 \r\n Content-type: text/html; charset=iso-8859-1 \r\n";
    $this->lastEmailSent = false;
  }
 
  /**
   * Setter method for a log entry
   */
  public function setLog($type = '', $message = ''){
    try{
      $this->setType($type);
      $this->setMessage($message);
    }catch(Exception $e){
      echo 'Caught exception:' . $e->getMessage();
    }
  }
  
  /**
   * Returns current log entry information
   */
  public function getLog(){
    return array(
        'type' => $this->getType(),
        'message' => $this->getMessage(),
        'ip_address' => $this->getIP()
    );
  }
 
  /**
   * Saves error/notification to the database
   */
  public function saveLog(){
    try{
      $this->db = new DatabaseHelper();
    }catch(Exception $e){
      
    }
      
    #save log data to database
    $this->db->insert('logs', $this->getLog() );
    #return or redirect user
    return;
  }
  
  /**
   * Generates and sends an error/notification email based on $this->type
   * 
   */
  public function sendEmail(){
    switch($this->getType()){
      case 'error':
        $message = $this->generateErrorEmail();
        break;
      
      default: 
        $message = "asdasda";//$this->generateNotificationEmail();
    }
    $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $this->lastEmailSent = mail('dakinenz@gmail.com','hey' ,$message,$headers);
    return $this->lastEmailSent;
  }
  
  /**
   * Generates a notification based on log data
   */
  public function notification(){
    
  }

  /**
   * A temporary message shown to the user 
   */
  private function flashMessage(){}

  
  
  /**
   * Receives error data and calls sendEmail()
   * 
   * @returns string $emailContent The email to send
   */
  private function generateErrorEmail(){
    
  }
  
  /**
   * Processes the notification and calls sendEmail()
   * 
   * @returns string $emailContent The email to send
   */
  private function generateNotificationEmail(){}
  
  /**
   * Build an HTML email template to send emails
   */
  private function generateEmailTemplate(){}
  
  /**
   * @param string $type Set error to given type
   */
  public function setType($type = ''){
    if(!$type)
      throw new Exception('Can not set Error type, type not supplied.');
    
    $this->type = $type;
  }
  
  public function getType(){
    return $this->type;
  }
  
  public function setMessage($message = ''){
    if(!$message)
      throw new Exception('Can not set Error message, message not supplied.');
  
    $this->message = $message;
  }
  public function getMessage(){
    return $this->message;
  }
  
  private function getIP(){
    return $_SERVER['REMOTE_ADDR'];
  }
  private function getUser(){}
}
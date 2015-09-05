<?php 
include_once('class.database.php');

class Students{
    private $db;
    public $lastid;
    public function __construct(){  

        $this->db = new Database();

    if(isset($_POST['json'])){
        $json = $_POST['json'];
        $_SESSION['jsonData'] = $json;
        $json = json_decode($_SESSION["jsonData"],true);
        $this->data = $json;
        $this->action = $json['request'];
         $this->lastid = $this->db->lastInsertId();

         
    }else{
        $this->lastid = $this->db->lastInsertId();
    }
    
    }

    
    public function save(){
        
        $this->logFile($this->data);
        $sFname = $this->data['sFname'];
        $sMname= $this->data['sMname'];
        $sLname = $this->data['sLname'];
        $sAddress = $this->data['sAddress'];
        $sNotes =$this->data['sNotes'];
    
        
        $this->lastid = $this->db->insertData('students',
                               array('sFname','sMname','sLname','sAddress','sNotes'),
                               array($sFname,$sMname,$sLname,$sAddress,$sNotes));
       
    }
    
    public function update(){

        $this->logFile($this->data);
        $student_id = $this->data['student_id'];
        $sFname = $this->data['sFname'];
        $sMname = $this->data['sMname'];
        $sLname = $this->data['sLname'];
        $sAddress = $this->data['sAddress'];
        $sNotes =$this->data['sNotes'];
        
        $this->db->updateData('students',array('sFname'=>$sFname,
                                                'sMname'=>$sMname,
                                                'sLname'=>$sLname,
                                                'sAddress'=>$sAddress,
                                                'sNotes'=>$sNotes,
                                              ),'sID='.$student_id);
    }
    
    public function view($id=null){
        $student = $this->db->fetchAll('students','sID='.$id);
        
        return $student;
    }
    
    public function viewAll(){
        $students = $this->db->fetchAll('students',null);
        
        return $students;
    }
    
    public function remove(){

    }
    
    private function logFile($msg)
    {
        $myFile = "visibility.txt";
        $fh = fopen($myFile, 'a') or die("can't open file");
            if(is_array($msg)){
            fwrite($fh, print_r($msg, TRUE));
            
        } else {
            fwrite($fh, $msg . PHP_EOL);
        }
        fclose($fh);
    }
    
}
?>
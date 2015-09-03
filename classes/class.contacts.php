<?php
include_once('class.database.php');
include_once('class.students.php');

class Contacts{
    private $db;
    private $student;
    private $lastid;

    
    public function __construct(){
        $this->db = new Database();   
        $json = $_POST['json'];
        $_SESSION['jsonData'] = $json;
        $json = json_decode($_SESSION["jsonData"],true);
        
        $this->data = $json;
        $this->action = $json['request'];
    }
    
    public function save($id){
        foreach($this->data['cList'] as $value)
        {
            $cfname = $value['cFName'];
            $clname = $value['cLName'];
            $cemail = $value['cEmail'];
            $ctitle = $value['cTitle'];
            $cphone = $value['cPhone'];
            $cnotes = $value['cNotes'];
      		$values = array('cFName','cLName','cEmail','cTitle','cPhone','cNotes','sID');
      		$this->db->insertData('contacts',$values, 
      		                       array($cfname,$clname,$cemail,$ctitle,$cphone,$cnotes,$id));

        }
    }
    
    public function update(){
        
        foreach($this->data['cList'] as $value)
        {
            
            $cid = $value['cID'];
            $cfname = $value['cFName'];
            $clname = $value['cLName'];
            $cemail = $value['cEmail'];
            $ctitle = $value['cTitle'];
            $cphone = $value['cPhone'];
            $cnotes = $value['cNotes'];
      		
      		$this->db->updateData('contacts',array('cFName'=>$cfname,'cLName'=>$clname,'cEmail'=>$cemail,'cTitle'=>$ctitle,
      		    'cPhone'=>$cphone,'cNotes'=>$cnotes),'id='.$cid);
        }
    }
    
    public function view($id = null){
        $contacts = $this->db->fetchAll('contacts','sID = '.$id );
        //.' AND is_active = 1'
        return $contacts;
    }
    
    public function remove(){
        // foreach($this->data['removed_cid'] as $value)
        // {
        //     $cid = $value['cid_delete'];        
        //     $this->db->updateData('tbl_org_contacts',array('is_active'=>$is_active),'id = '.$cid);
        // }
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
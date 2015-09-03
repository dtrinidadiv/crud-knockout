<?php
include_once('class.students.php');
include_once('class.contacts.php');


class Main{
    private $students;
    private $contacts;

 
    private $action;
    private $data;
    
    private $studentId;
    
    
    public function __construct(){
        
        session_start();
        $this->students = new Students();
        $this->contacts = new Contacts();
        //if(isset($_POST['json'])){
        
            $json = $_POST['json'];
            $_SESSION['jsonData'] = $json;
            
            $json = json_decode($_SESSION["jsonData"],true);
            
            $this->data = $json;
    
            $this->action = $json['request'];
            $this->action_type();
            
        // }else{
        //     echo 'JSON is empty';
        // }

    }
    
    private function action_type(){
        switch ($this->action){
            case 'save':
                $this->save();
                break;
            case 'update':
                $this->update();
                break;
                
            case 'remove':
                $this->remove();
                break;
                
            default:
                $this->view();
                break;
                
        }
    }
    
    public function save(){
        $this->students->save();
        $studentId = $this->students->lastid;
        $this->contacts->save($studentId);

    }
    
    public function update(){
        $this->business->update();
        $this->contacts->update();
    }
    
    public function view(){
        $return = array();
        
        $this->student_id = $_POST['id'];
        $id = $this->student_id;
        
       
        
        $return['info']['allStudents'] = $this->students->viewAll();

        $return['info']['student'] = $this->students->view($id);
        $return['info']['contacts'] = $this->contacts->view($id);
    
        
        echo json_encode($return);
    }
    
    public function remove(){
        $this->business->remove();
        $this->contacts->remove();
    
    }
    
}

$main = new Main();
?>
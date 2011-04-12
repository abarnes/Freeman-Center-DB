<?php
class EventsController extends AppController {
 
	var $name = 'Events';
        //var $layout = 'default';
	var $helpers = array('Html', 'Form', 'Time', 'javascript');
	//var $uses = array('Choice','Race','Driver','Year','DriversYear','User','Record','Place');
	var $components = array('Auth','Session');
        
        function beforeFilter() {
            //$this->Auth->allow('login');
        }
	
	function index () {
		$this->set('event',$this->Event->find('all'));
	}
	
	function add() {
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash('"'.$this->data['Event']['name'] . '" Successfully Added.');
				$this->redirect(array('controller'=>'events','action' => 'index'));
			} else {
				$this->Session->setFlash('Failed to Save Event');
			}
		}
	}
    
	function edit($id) {
	$this->set('id',$id);
	    $this->Event->id = $id;
	    $userinfo = $this->Auth->user();
	    //die(print_r($userinfo));
	    if ($userinfo['User']['admin']=='1') {
		    if (empty($this->data)) {
			    $this->data = $this->Event->read();
		    } else {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash('Event Information Has Been Updated.');
				$this->redirect(array('action'=>'index'));
			}
		    }
	    } else {
		    $this->Session->setFlash('This Action Is Restricted To Administrators. Please Authenticate As An Administrator And Try Again.');
		    $this->redirect(array('controller'=>'users','action'=>'login'));
		    }
	}
	
	function view($id) {
		$this->set('e',$this->Event->findById($id));
	}
    
	function delete($id) {
	    $userinfo = $this->Auth->user();
	    if ($userinfo['User']['admin']=='1') {
		    $this->Event->delete($id);
		    $this->Session->setFlash('Event Successfully Deleted.');
				$this->redirect(array('action'=>'index'));
	    } else {
		    $this->Session->setFlash('Only Administrators Can Delete Events. Please Authenticate As An Administrator And Try Again.');
		    $this->redirect(array('action'=>'login'));
	    }
	}
    
}

?>
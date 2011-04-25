<?php
class EventsController extends AppController {
 
	var $name = 'Events';
        //var $layout = 'default';
	var $helpers = array('Html', 'Form', 'Time', 'javascript');
	var $uses = array('Event','Contact','Donor');
	var $components = array('Auth','Session');
        
        function beforeFilter() {
            //$this->Auth->allow('login');
        }
	
	function index () {
		$this->paginate = array(
		     'order' => array('Event.date DESC'),
		    'limit' => 22
		);
		$data = $this->paginate('Event');
		$this->set('event',$data);
	}
	
	function add() {
		$this->set('donors', $this->Event->Donor->find('list',array('order'=>'Donor.name DESC')));
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
		$this->set('donors', $this->Event->Donor->find('list',array('order'=>'Donor.name DESC')));	
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
		$e = $this->Event->findById($id);
		$this->set('e',$e);
	
		$f = $this->Contact->find('all',array('conditions'=>array('Contact.event_id'=>$id)));
		//die(print_r($f));
		$sum = 0;
		foreach ($f as $f) {
			$sum = $sum+$f['Contact']['donation'];
		}
		$this->set('sum',$sum);
		
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
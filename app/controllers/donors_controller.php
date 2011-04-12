<?php
class DonorsController extends AppController {
 
	var $name = 'Donors';
        //var $layout = 'default';
	var $helpers = array('Html', 'Form', 'Time', 'javascript');
	//var $uses = array('Choice','Race','Driver','Year','DriversYear','User','Record','Place');
	var $components = array('Auth','Session');
        
        function beforeFilter() {
            //$this->Auth->allow('view');
        }
        
	
	function index () {
		$this->set('donors',$this->Donor->find('all'));
	}
	
	function add() {
		$userinfo = $this->Auth->user();
		/*if ($userinfo['User']['admin']!='1') {
			$this->redirect(array('controller'=>'pages','action' => 'home'));
			$this->Session->setFlash('You Do Not Have Permission To Access This Page');
		}*/
		$this->set('events', $this->Donor->Event->find('list',array('order'=>'Event.date DESC')));
		if (!empty($this->data)) {
			//die(print_r($this->data));
			if ($this->Donor->save($this->data)) {
				$this->Session->setFlash($this->data['Item']['name'] . '" Successfully Added.');
				$this->redirect(array('controller'=>'donors','action' => 'index'));
			} else {
				$this->Session->setFlash('Error: Failed to Save Donor');
			}
		}
	}
    
	function edit($id) {
		$this->set('id',$id);
		$this->Donor->id = $id;
		$this->set('events', $this->Donor->Event->find('list',array('order'=>'Event.date DESC')));
		if (empty($this->data)) {
			$this->data = $this->Donor->read();
		} else {
			if ($this->Donor->save($this->data)) {
				$this->Session->setFlash('Donor Has Been Updated.');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error: Failed to Save');
			}
		}
	}
    
	function delete($id) {
		$this->Donor->delete($id);
		$this->Session->setFlash('Donor Successfully Deleted.');
		$this->redirect(array('action'=>'index'));
	}
    
}

?>
<?php
class ContactsController extends AppController {
 
	var $name = 'Contacts';
        //var $layout = 'default';
	var $helpers = array('Html', 'Form', 'Time', 'javascript');
	var $uses = array('Contact','Event','Donor');
	var $components = array('Auth','Session');
        
        function beforeFilter() {
            //$this->Auth->allow('view');
        }
        
	
	function index () {
		$this->set('contact',$this->Contact->find('all'));
	}
	
	function add() {
		$ev = $this->Donor->Event->find('list',array('order'=>'Event.date DESC'));
		$ev[0]='none';
		$this->set('events', $ev);
		$this->set('donors', $this->Donor->find('list',array('order'=>'Donor.name ASC')));
		if (!empty($this->data)) {
			//die(print_r($this->data));
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash("Contact Saved");
				$this->redirect(array('controller'=>'Contacts','action' => 'index'));
			} else {
				$this->Session->setFlash('Error: Failed to Save Contact');
			}
		}
	}
    
	function edit($id) {
		$this->set('id',$id);
		$this->Contact->id = $id;
		$this->set('events', $this->Event->find('list',array('order'=>'Event.date DESC')));
		if (empty($this->data)) {
			$this->data = $this->Contact->read();
		} else {
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash('Contact Has Been Updated.');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error: Failed to Save');
			}
		}
	}
    
	function delete($id) {
		$this->Contact->delete($id);
		$this->Session->setFlash('Contact Successfully Deleted.');
		$this->redirect(array('action'=>'index'));
	}
    
}

?>
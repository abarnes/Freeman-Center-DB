<?php
class ContactsController extends AppController {
 
	var $name = 'Contacts';
        //var $layout = 'default';
	var $helpers = array('Html', 'Form', 'Time', 'javascript');
	var $uses = array('Contact','Event','Donor','DonorsEvent');
	var $components = array('Auth','Session');
        
        function beforeFilter() {
            //$this->Auth->allow('view');
        }
        
	
	function index () {
		$this->paginate = array(
		     'order' => array('Contact.created DESC'),
		    'limit' => 22
		);
		$data = $this->paginate('Contact');
		$this->set('contact',$data);
	}
	
	function add($id=null) {
		$ev = $this->Donor->Event->find('list',array('order'=>'Event.date DESC'));
		$ev[0]='none';
		$this->set('events', $ev);
		$this->set('donors', $this->Donor->find('list',array('order'=>'Donor.name ASC')));
		
		//add contact for a person
		if ($id!='') {
			$this->set('def',$id);
		} else {
			$this->set('def','');
		}
		if (!empty($this->data)) {
			if ($this->data['Contact']['type']=='at event') {
				$this->data['Contact']['event_id']=$this->data['Contact']['ev'];
				
				$c = $this->DonorsEvent->find('count',array('conditions'=>array('DonorsEvent.event_id'=>$this->data['Contact']['ev'],'DonorsEvent.donor_id'=>$this->data['Contact']['donor_id'])));
				if ($c==0) {
					$this->DonorsEvent->create();
					$data = array();
					$data['DonorsEvent']['event_id']=$this->data['Contact']['ev'];
					$data['DonorsEvent']['donor_id']=$this->data['Contact']['donor_id'];
					$this->DonorsEvent->save($data);
				} else {
					echo 'already';
				}
			}
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
		$this->set('donors', $this->Donor->find('list',array('order'=>'Donor.name ASC')));
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
	
	function view($id) {
		$contact = $this->Contact->findById($id);
		$this->set('e',$contact);
	}
    
}

?>
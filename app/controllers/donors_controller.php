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
		$this->set('donor',$this->Donor->find('all',array('order'=>'Donor.created DESC')));
	}
	
	function add() {
		//$userinfo = $this->Auth->user();
		$this->set('events', $this->Donor->Event->find('list',array('fields'=>array('Event.id','Event.name'),'order'=>'Event.date DESC')));
		if (!empty($this->data)) {
			if ($this->data['Contact']['type']=='at event') {
				$this->data['Contact']['event_id']=$this->data['Contact']['ev'];
			}
			if ($this->Donor->save($this->data)) {
				$this->Session->setFlash('"'.$this->data['Donor']['name'] . '" Successfully Added.');
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
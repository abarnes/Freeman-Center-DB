<?php
class DonorsController extends AppController {
 
	var $name = 'Donors';
        //var $layout = 'default';
	var $helpers = array('Html', 'Form', 'Time', 'javascript');
	var $uses = array('Donor','Contact','Event');
	var $components = array('Auth','Session');
        
        function beforeFilter() {
            //$this->Auth->allow('view');
        }
        
	
	function index () {
		$this->paginate = array(
		     'order' => array('Donor.created DESC'),
		    'limit' => 22
		);
		$data = $this->paginate('Donor');
		$this->set('donor',$data);
	}
	
	function add() {
		//$userinfo = $this->Auth->user();
		$this->set('events', $this->Donor->Event->find('list',array('fields'=>array('Event.id','Event.name'),'order'=>'Event.date DESC')));
		if (!empty($this->data)) {
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
				$this->redirect(array('action'=>'view/'.$id));
			} else {
				$this->Session->setFlash('Error: Failed to Save');
			}
		}
	}
	
	function view ($id) {
		$donor = $this->Donor->findById($id);
		$this->set('donor',$donor);
		
		//find contact variables
		$lm = $this->Donor->Contact->find('first',array('order'=>'Contact.date DESC','conditions'=>array('Contact.donor_id'=>$id)));
		if (isset($lm['Contact']['id'])) {
			$this->set('last',date('F j, Y',strtotime($lm['Contact']['date'])));
		} else {
			$this->set('last','none');
		}
		
		$lm = $this->Donor->Contact->find('first',array('order'=>'Contact.date DESC','conditions'=>array('Contact.type'=>'phone','Contact.donor_id'=>$id)));
		if (isset($lm['Contact']['id'])) {
			$this->set('lastph',date('F j, Y',strtotime($lm['Contact']['date'])));
		} else {
			$this->set('lastph','none');
		}
		
		$lm = $this->Donor->Contact->find('first',array('order'=>'Contact.date DESC','conditions'=>array('Contact.type'=>'mail','Contact.donor_id'=>$id)));
		if (isset($lm['Contact']['id'])) {
			$this->set('lastm',date('F j, Y',strtotime($lm['Contact']['date'])));
		} else {
			$this->set('lastm','none');
		}
		
		$lm = $this->Donor->Contact->find('first',array('order'=>'Contact.date DESC','conditions'=>array('Contact.type'=>'email','Contact.donor_id'=>$id)));
		if (isset($lm['Contact']['id'])) {
			$this->set('lastem',date('F j, Y',strtotime($lm['Contact']['date'])));
		} else {
			$this->set('lastem','none');
		}
		
		$lm = $this->Donor->Contact->find('first',array('order'=>'Contact.date DESC','conditions'=>array('Contact.type'=>'at event','Contact.donor_id'=>$id)));
		if (isset($lm['Contact']['id'])) {
			$this->set('lastev',date('F j, Y',strtotime($lm['Contact']['date'])));
		} else {
			$this->set('lastev','none');
		}
		
		$lm = $this->Donor->Contact->find('first',array('order'=>'Contact.date DESC','conditions'=>array('Contact.donation >'=>'0','Contact.donor_id'=>$id)));
		if (isset($lm['Contact']['id'])) {
			$this->set('lastd',date('F j, Y',strtotime($lm['Contact']['date'])));
		} else {
			$this->set('lastd','none');
		}
		
		$lm = $this->Donor->Contact->find('count',array('order'=>'Contact.date DESC','conditions'=>array('Contact.donation >'=>'0','Contact.donor_id'=>$id)));
		$this->set('donation_num',$lm);
		
		$lm = $this->Donor->Contact->find('all',array('order'=>'Contact.date DESC','conditions'=>array('Contact.donation >'=>'0','Contact.donor_id'=>$id)));
		if (isset($lm[0]['Contact']['id'])) {
			$s = 0;
			foreach ($lm as $l) {
				$s = $s+$l['Contact']['donation'];
			}
			$this->set('donation_sum',$s);
		} else {
			$this->set('donation_sum','none');
		}
		
		$lm = $this->Donor->Contact->find('all',array('order'=>'Contact.date DESC','conditions'=>array('Contact.donor_id'=>$id)));
		$this->set('each',$lm);
	}
    
	function delete($id) {
		$this->Donor->delete($id);
		$this->Session->setFlash('Donor Successfully Deleted.');
		$this->redirect(array('action'=>'index'));
	}
	
	function filter() {
		
	}
	
	function search() {
		if (!empty($this->data)) {
			$all = $this->Donor->find('all',array('conditions'=>array('Donor.no_contact'!='1')));
			
			
			$ids = array();
			foreach ($all as $a) {
				if ($this->data['Donor']['type']!='any') {
					$c = $this->Contact->find('count',array('conditions'=>array('Contact.donor_id'=>$a['Donor']['id'],'Contact.type'=>$this->data['Donor']['type'],"Contact.date <" => date('Y-m-d', strtotime("-".$this->data['Donor']['max']."days")))));
				} else {
					$c = $this->Contact->find('count',array('conditions'=>array('Contact.donor_id'=>$a['Donor']['id'],"Contact.date <" => date('Y-m-d', strtotime("-".$this->data['Donor']['max']."days")))));	
				}
				
				//die(print_r($c));
				if ($c>0) {
					$ids[] = $a['Donor']['id'];
				}
			}
			
			$conditions = array('Donor.id'=>$ids,'Donor.no_contact'=>'0');
			
		} else {
			$conditions = array('Donor.no_contact'=>'0');
		}
		
		$this->paginate = array(
		     'order' => array('Donor.created DESC'),
		    'limit' => 22,
		    'conditions' => $conditions
		);
		$data = $this->paginate('Donor');
		$this->set('donor',$data);
	}
	
	function stop($id) {
		//$this->Donor->read(null, $id);
		$this->Donor->id = $id;
		if ($this->Donor->saveField('no_contact', true)) {
			$this->Session->setFlash('Donor set to "no contact"');
			$this->redirect(array('action'=>'view/'.$id));
		} else {
			$this->Session->setFlash('Error Saving');
			$this->redirect(array('action'=>'view/'.$id));
		}
	}
	
	function start($id) {
		$this->Donor->id = $id;
		if ($this->Donor->saveField('no_contact', false)) {
			$this->Session->setFlash('Donor contact resumed.');
			$this->redirect(array('action'=>'view/'.$id));
		} else {
			$this->Session->setFlash('Error Saving');
			$this->redirect(array('action'=>'view/'.$id));
		}
	}
    
}

?>
<?php
class UsersController extends AppController {
 
	var $name = 'Users';
        //var $layout = 'default';
	var $helpers = array('Html', 'Form', 'Time', 'javascript');
	//var $uses = array('Choice','Race','Driver','Year','DriversYear','User','Record','Place');
	var $components = array('Auth','Session');
        
        function beforeFilter() {
            $this->Auth->allow('login');
        }
	
        function login() {
		//$this->set('options',$this->User->find('list',array('fields'=>array('User.username','User.username'),'order'=>'User.username ASC')));
		$this->Auth->redirect(array('controller' => 'users', 'action' => 'index'));
	}

	function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	function index () {
		$this->set('user',$this->User->find('all'));
	}
	
	function add() {
		$userinfo = $this->Auth->user();
		if ($userinfo['User']['admin']=='0') {
			$this->Session->setFlash('Only Administrators Can Add Users. Please Authenticate As An Administrator And Try Again.');
			$this->redirect(array('action'=>'login'));
		}
		    if (!empty($this->data)) {
			    $p2 = $this->data['User']['password2'];
			    if ($this->data['User']['password'] == /*$this->data['User']['password2']*/$this->Auth->password($p2)) {
				    if ($this->User->save($this->data)) {
					    $this->Session->setFlash('"'.$this->data['User']['username'] . '" Successfully Added.');
					    if($this->Auth->user()) {
						$aut = '1';
	     				    } else {
						$aut = '0';
					    }
					    if ($aut=='0') {
						$this->Auth->login(array('username'=>$this->data['User']['username'],'password'=>$this->data['User']['password']));
					    }
					    $this->redirect(array('controller'=>'users','action' => 'index'));
				    } else {
					    $this->Session->setFlash('Failed to Save User');
				    }
			    } else {
				    $this->Session->setFlash('Passwords Did Not Match.  Please Try Again.');
			    }
		    }
	}
    
	function edit($id) {
	$this->set('id',$id);
	    $this->User->id = $id;
	    $userinfo = $this->Auth->user();
		if ($userinfo['User']['admin']=='1') {
			if ($userinfo['User']['admin']=='0') {
			$this->Session->setFlash('Only Administrators Can Add Users. Please Authenticate As An Administrator And Try Again.');
			$this->redirect(array('action'=>'login'));
		}
	    //die(print_r($userinfo));
	    if ($userinfo['User']['admin']=='1' || $userinfo['User']['id']==$id) {
		    if (empty($this->data)) {
			    $this->data = $this->User->read();
		    } else {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('User Information Has Been Updated.');
				$this->redirect(array('action'=>'index'));
			}
		    }
	    } else {
		    $this->Session->setFlash('This Action Is Restricted To Administrators. Please Authenticate As An Administrator And Try Again.');
		    $this->redirect(array('controller'=>'users','action'=>'login'));
		    }
	}
	
	function view($id) {
		
	}
	
	function passwordchange($id = null) {
		$this->User->id = $id;
		$userinfo = $this->Auth->User();
		if ($id == $userinfo['User']['id'] || $userinfo['User']['level']=='1') {
			if (empty($this->data)) {
				$this->data = $this->User->read();
			} else {
				$p2 = $this->data['User']['password2'];
				if ($this->data['User']['password'] == $p2  && strlen($p2)>='6') {
					if ($this->User->saveField('password',$this->Auth->password($this->data['User']['password']))) {
						$this->Session->setFlash('Password Changed.');
						$this->redirect(array('controller'=>'users','action' => 'index'));
					}
				} else {
					$this->Session->setFlash('Passwords Did Not Match, Or Your New Password Is Less Than 6 Characters.');
				}
			}
		} else {
			$this->Session->setFlash('You Cannot Edit This User.');
		}	
	}
    
	function delete($id) {
	    $userinfo = $this->Auth->user();
	    if ($userinfo['User']['admin']=='1') {
		    $this->User->delete($id);
		    $this->Session->setFlash('User Successfully Deleted.');
			$this->redirect(array('action'=>'index'));
	    } else {
		    $this->Session->setFlash('Only Administrators Can Delete Users. Please Authenticate As An Administrator And Try Again.');
		    $this->redirect(array('action'=>'login'));
	    }
	}
    
}

?>
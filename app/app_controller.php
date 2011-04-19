<?php
class AppController extends Controller {
	
	var $components = array('Auth');
	
	function beforeRender() {
		if($this->Auth->user()) {
			$aut = true;
			$this->set('aut',true);
			$userInfo = $this->Auth->user();
			if ($userInfo['User']['admin']==1) {
				$this->set('admin',true);				
			} else {
				$this->set('admin',false);
			}
		} else {
			$aut = false;
			$this->set('aut',false);
		}
	}
	
}

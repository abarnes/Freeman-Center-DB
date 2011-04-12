<div style="width:100%;margin-right:auto;margin-left:auto;text-align:center;">
    
<?php
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username', array( 'label' => 'User: '));
    echo $form->input('password', array('label'=>'Password: '));
    echo $form->end('Login');
?>
<br/>
</div>
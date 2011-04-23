<div style="width:400px;text-align:left;float:left;">
    <br/>
<?php
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username', array( 'label' => '<h4>Username: </h4>'));
    echo $form->input('password', array('label'=>'<h4>Password: </h4>'));
    echo $form->end('Login');
?>
<br/>
</div>
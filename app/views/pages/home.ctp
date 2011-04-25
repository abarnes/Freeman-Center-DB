<h1>Freeman Center Donor Database</h1>

<br/>
<p style="color:white;">

Welcome to the Freeman Center Donor Database.<br/><br/>

Login to Continue<br/><br/>
(for testing, login with username "freeman" and password "password")

<div style="width:30%;margin-right:auto;margin-left:auto;text-align:left;float:left;">
    
<?php
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username', array( 'label' => '<h4>Username: </h4>'));
    echo $form->input('password', array('label'=>'<h4>Password: </h4>'));
    echo $form->end('Login');
?>
</div>
<br/>

</p>
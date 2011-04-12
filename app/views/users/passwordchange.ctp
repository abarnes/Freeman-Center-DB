<div style="width:100%;margin-right:auto;margin-left:auto;text-align:center;">
    
        <?php
    echo $form->create('User', array('action' => 'passwordchange'));
    echo $form->input('password', array('label'=>'New Password: ','type'=>'password','value'=>''));
    echo $form->input('password2', array('type'=>'password','value'=>'','label'=>'Retype New Password: '));
    echo $form->input('id', array('type'=>'hidden'));
    echo $form->end('Change Password');
?>
<br/>
</div>

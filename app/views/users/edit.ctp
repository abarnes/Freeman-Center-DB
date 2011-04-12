<div style="width:100%;margin-right:auto;margin-left:auto;text-align:center;">
    
    <table style="border:0px solid black;margin-right:auto;margin-left:auto;">
    
    <?php echo $form->create('User', array('action' => 'edit/'.$id)); ?>
    <tr><td style="text-align:right;font-size:80%;">Name: </td><td><?php echo $form->input('username', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Password: </td><td><?php echo $form->input('password', array('label'=>'','value'=>'')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Retype Password: </td><td><?php echo $form->input('password2', array('type'=>'password','value'=>'','label'=>'')); ?></td></tr>
    <tr><td></td><td>
    <?php echo $form->input('id', array( 'type'=>'hidden')); ?>
    <?php echo $form->end('Update User'); ?>
    <br/>
</td></tr></table>
</div>


</p>

    
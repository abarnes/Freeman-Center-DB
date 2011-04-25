<div style="width:100%;margin-right:auto;margin-left:auto;text-align:center;">
    
    <table style="border:0px solid black;margin-right:auto;margin-left:auto;">
    
    <?php echo $form->create('Event', array('action' => 'edit')); ?>
    <tr><td style="text-align:right;font-size:80%;">Name: </td><td><?php echo $form->input('name', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Date: </td><td><?php echo $form->input('date', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Attendees: </td><td><?php echo $form->input('Donor', array('label'=>'')); ?>
    <p>Hold the control key to select multiple donors (command key on a Mac)</p></td></tr>
    <tr><td></td><td>
    <?php echo $form->input('id', array( 'type'=>'hidden')); ?>
    <?php echo $form->end('Update Event'); ?>
    <br/>
</td></tr></table>
</div>



    
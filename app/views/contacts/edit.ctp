<div style="width:100%;margin-right:auto;margin-left:auto;text-align:center;">
    
    <table style="border:0px solid black;margin-right:auto;margin-left:auto;">
    
    <?php echo $form->create('Contact', array('action' => 'edit')); ?>
    <tr><td style="text-align:right;font-size:80%;">Donor: </td><td><?php echo $form->input('donor_id', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Date: </td><td><?php echo $form->input('date', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Type: </td><td><?php echo $form->input('type', array( 'label' => '','options'=>array('email'=>'email','phone'=>'phone','mail'=>'mail','in person'=>'in person','at event'=>'at event','other'=>'other'))); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Event (if contacted at an event): </td><td><?php echo $form->input('event_id', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Donation: $</td><td><?php echo $form->input('donation', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Notes: </td><td><?php echo $form->input('notes', array('label'=>'')); ?></td></tr>
    <tr><td></td><td>
    <?php echo $form->input('id', array( 'type'=>'hidden')); ?>
    <?php echo $form->end('Submit'); ?>
    <br/>
</td></tr></table>
</div>



    
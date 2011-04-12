<div style="width:100%;margin-right:auto;margin-left:auto;text-align:center;">
    
    <table style="border:0px solid black;margin-right:auto;margin-left:auto;">
    
    <?php echo $form->create('Event', array('action' => 'add')); ?>
    <tr><td style="text-align:right;font-size:80%;">Name: </td><td><?php echo $form->input('name', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Date: </td><td><?php echo $form->input('date', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Attendees: </td><td><?php echo $form->input('donor_id', array('label'=>'')); ?></td></tr>
    <tr><td></td><td>
    <?php echo $form->end('Add Event'); ?>
    <br/>
</td></tr></table>
</div>



    
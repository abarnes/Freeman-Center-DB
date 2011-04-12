<div style="width:100%;margin-right:auto;margin-left:auto;text-align:center;">
    
    <table style="border:0px solid black;margin-right:auto;margin-left:auto;">
    
    <?php echo $form->create('Donor', array('action' => 'edit')); ?>
    <tr><td style="text-align:right;font-size:80%;">Name: </td><td><?php echo $form->input('name', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Street Address: </td><td><?php echo $form->input('address', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">City: </td><td><?php echo $form->input('city', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">State: </td><td><?php echo $form->input('state', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Zipcode: </td><td><?php echo $form->input('zip', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Primary Phone Number: </td><td><?php echo $form->input('primary_phone', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Secondary Phone Number: </td><td><?php echo $form->input('secondary_phone', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Email: </td><td><?php echo $form->input('email', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Notes: </td><td><?php echo $form->input('notes', array( 'label' => '')); ?></td></tr>
    <tr><td></td><td>
    <?php echo $form->input('id',array('type'=>'hidden')); ?>
    <?php echo $form->end('Add Donor'); ?>
    <br/>
</td></tr></table>
</div>



    
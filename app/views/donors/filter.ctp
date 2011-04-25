<h2>Filter Donors</h2>

<div style="width:300px;margin-left:40px;">
<?php
echo $form->create('Donor',array('controller'=>'contacts','action'=>'search'));
echo '<td>'.$form->input('max',array('label'=>'<span style="color:white;">Days since Last Contact: </span>')).'</td>';
echo '<td>'.$form->input('type',array('label'=>'<span style="color:white;">Type of Contact: </span>','options'=>array('any'=>'any','mail'=>'mail','phone'=>'phone','email'=>'email','in person'=>'in person','at event'=>'at event','other'=>'other'))).'</td>';
echo '<td>'.$form->end('Submit').'</td>';
?>
</div>        


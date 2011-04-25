<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>

<h2>Search</h2>

<div style="width:300px;margin-left:40px;">
<?php
echo $form->create('Donor',array('controller'=>'contacts','action'=>'search'));
echo '<td>'.$form->input('max',array('label'=>'<span style="color:white;">Days since Last Contact: </span>')).'</td>';
echo '<td>'.$form->input('type',array('label'=>'<span style="color:white;">Type of Contact: </span>','options'=>array('any'=>'any','mail'=>'mail','phone'=>'phone','email'=>'email','in person'=>'in person','at event'=>'at event','other'=>'other'))).'</td>';
echo '<td>'.$form->end('Submit').'</td>';
?>
</div>

<table>
    <tr>
        <td>
            <?php echo $this->Paginator->sort('Donor', 'Donor.name'); ?>
        </td>
	<td>
	    <?php echo $this->Paginator->sort('Phone Number', 'Donor.phone_number'); ?>
	</td>
	<td>
	    <?php echo $this->Paginator->sort('Email', 'Donor.email'); ?>
	</td>
        <td>
            <?php echo $this->Paginator->sort('Address', 'Donor.address'); ?>
        </td>
    </tr>
<?php foreach ($donor as $u) { ?>
    <tr>
        <td>
            <h5><?php echo $html->link($u['Donor']['name'],array('controller'=>'donors','action'=>'view/'.$u['Donor']['id'])); ?></h5>
        </td>
	<td>
	    <?php if ($u['Donor']['primary_phone']!='') { ?>
		<h5><?php echo $u['Donor']['primary_phone']; ?></h5>
	    <?php } else { echo 'none'; } ?>
	</td>
	<td>
	    <?php if ($u['Donor']['email']!='') { ?>
		<h5><a href="mailto:<?php echo $u['Donor']['email']; ?>"><?php echo $u['Donor']['email']; ?></a></h5>
	    <?php } else { echo 'none'; } ?>
	</td>
	<td>
	    <?php if ($u['Donor']['address']!='') { ?>
		<h5><?php echo $u['Donor']['address'].'<br/>'.$u['Donor']['city'].', '.$u['Donor']['state'].'<br/>'.$u['Donor']['zip']; ?></h5>
	    <?php } else { echo 'none'; } ?>
	</td>
    </tr>
<?php } ?>
</table>

<div style="width:200px;text-align:center;margin-left:auto;margin-right:auto;" class="link">
    <!-- Shows the page numbers -->
    <?php echo $this->Paginator->prev('<< Previous', null, null, array('class' => 'disabled')); ?>
    <span style="margin-left:3px;"><?php echo $this->Paginator->numbers(); ?></span>
    <!-- Shows the next and previous links -->
    <?php echo $this->Paginator->next('Next >>', null, null, array('class' => 'disabled')); ?><br/><br/> 
    <!-- prints X of Y, where X is current page and Y is number of pages -->
    <h6><?php echo $this->Paginator->counter(); ?></h6>
</div>
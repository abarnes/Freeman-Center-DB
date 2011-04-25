<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>

<h2>Donors</h2>

<div class="link">
<?php echo $html->link('Add Donor',array('action'=>'add')); ?>
</div>
<br/>

<table>
    <tr>
        <td>
            <?php echo $this->Paginator->sort('Name', 'Donor.name'); ?>
        </td>
	<td>
	    <?php echo $this->Paginator->sort('Added', 'Donor.created'); ?>
	</td>
        <td>
            Action
        </td>
    </tr>
<?php foreach ($donor as $u) { ?>
    <tr>
        <td>
            <h5><?php echo $html->link($u['Donor']['name'],array('action'=>'view/'.$u['Donor']['id'])); ?>
	    <?php if ($u['Donor']['no_contact']=='1') { ?>
		<span style="color:red;"><em>Donor Requested No Contact</em></span>
	    <?php } ?>
	    </h5>
        </td>
	<td>
	    <h5><?php echo date('m-d-Y',strtotime($u['Donor']['created'])); ?></h5>
	</td>
        <td>
	    <h5><?php echo $html->link('Record Contact',array('controller'=>'contacts','action'=>'add/'.$u['Donor']['id'])); ?>
	    <?php if ($u['Donor']['email']!='') { ?>
		<a href="mailto:<?php echo $u['Donor']['email']; ?>">Email</a>
	    <?php } ?>
            <?php echo $html->link('Edit',array('action'=>'edit/'.$u['Donor']['id'])); ?>
            <?php echo $html->link(
				'Delete', 
				array('action'=>'delete/'.$u['Donor']['id']), 
				null, 
				'Are You Sure You Want To Delete This Donor?'
			); ?></h5>
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
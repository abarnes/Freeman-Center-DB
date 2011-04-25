<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>

<h2>Contact</h2>

<div class="link">
<?php echo $html->link('Add Contact',array('action'=>'add')); ?>
</div>
<br/>

<table>
    <tr>
        <td>
            <?php echo $this->Paginator->sort('Donor', 'Donor.name'); ?>
        </td>
	<td>
	    <?php echo $this->Paginator->sort('Type', 'Contact.username'); ?>
	</td>
	<td>
	    <?php echo $this->Paginator->sort('Donation', 'Contact.donation'); ?>
	</td>
	<td>
	    <?php echo $this->Paginator->sort('Date', 'Contact.date'); ?>
	</td>
        <td>
            Action
        </td>
    </tr>
<?php foreach ($contact as $u) { ?>
    <tr>
        <td>
            <h5><?php echo $html->link($u['Donor']['name'],array('controller'=>'donors','action'=>'view/'.$u['Donor']['id'])); ?></h5>
        </td>
	<td>
	    <h5><?php echo $u['Contact']['type']; ?>
	    <?php if ($u['Contact']['type']=='at event') {
                    echo ' - '.$html->link($u['Event']['name'],array('controller'=>'events','action'=>'view/'.$u['Event']['id']));
                } ?></h5>
	</td>
	<td>
	    <h5>$<?php echo $u['Contact']['donation']; ?></h5>
	</td>
	<td>
	    <h5><?php echo date('m-d-Y',strtotime($u['Contact']['date'])); ?></h5>
	</td>
        <td><h5>
	    <?php echo $html->link('View Details',array('action'=>'view/'.$u['Contact']['id'])); ?>
            <?php echo $html->link('Edit',array('action'=>'edit/'.$u['Contact']['id'])); ?>
            <?php echo $html->link(
				'Delete', 
				array('action'=>'delete/'.$u['Contact']['id']), 
				null, 
				'Are You Sure You Want To Delete This Contact?'
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
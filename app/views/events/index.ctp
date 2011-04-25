<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>

<h2>Events</h2>

<div class="link">
<?php echo $html->link('Add Event',array('action'=>'add')); ?>
</div>
<br/>

<table>
    <tr>
        <td>
            <?php echo $this->Paginator->sort('Event', 'Event.name'); ?>
        </td>
	<td>
	    <?php echo $this->Paginator->sort('Event', 'Event.date'); ?>
	</td>
        <td>
            Action
        </td>
    </tr>
<?php foreach ($event as $u) { ?>
    <tr>
        <td>
            <h5><?php echo $html->link($u['Event']['name'],array('action'=>'view/'.$u['Event']['id'])); ?></h5>
        </td>
	<td>
	    <h5><?php echo date('m-d-Y',strtotime($u['Event']['date'])); ?></h5>
	</td>
        <td>
            <h5><?php echo $html->link('Edit',array('action'=>'edit/'.$u['Event']['id'])); ?>
            <?php echo $html->link(
				'Delete', 
				array('action'=>'delete/'.$u['Event']['id']), 
				null, 
				'Are You Sure You Want To Delete This Event?'
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
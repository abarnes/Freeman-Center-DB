<h2>Events</h2>

<?php echo $html->link('Add Event',array('action'=>'add')); ?>
<br/>

<table>
    <tr>
        <th>
            Event
        </th>
	<th>
	    Date
	</th>
        <th>
            Action
        </th>
    </tr>
<?php foreach ($event as $u) { ?>
    <tr>
        <td>
            <?php echo $u['Event']['name']; ?>
        </td>
	<td>
	    <?php echo date('m-d-Y',strtotime($u['Event']['date'])); ?>
	</td>
        <td>
            <?php echo $html->link('Edit',array('action'=>'edit/'.$u['Event']['id'])); ?>
            <?php echo $html->link(
				'Delete', 
				array('action'=>'delete/'.$u['Event']['id']), 
				null, 
				'Are You Sure You Want To Delete This Event?'
			); ?>
        </td>
    </tr>
<?php } ?>
</table>
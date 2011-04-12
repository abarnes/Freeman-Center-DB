<h2>Contact</h2>

<?php echo $html->link('Add Contact',array('action'=>'add')); ?>
<br/>

<table>
    <tr>
        <th>
            Donor
        </th>
	<th>
	    Type
	</th>
	<th>
	    Donation
	</th>
	<th>
	    Date
	</th>
        <th>
            Action
        </th>
    </tr>
<?php foreach ($contact as $u) { ?>
    <tr>
        <td>
            <?php echo $u['Donor']['name']; ?>
        </td>
	<td>
	    <?php echo $u['Contact']['type']; ?>
	</td>
	<td>
	    $<?php echo $u['Contact']['donation']; ?>
	</td>
	<td>
	    <?php echo date('m-d-Y',strtotime($u['Contact']['date'])); ?>
	</td>
        <td>
            <?php echo $html->link('Edit',array('action'=>'edit/'.$u['Contact']['id'])); ?>
            <?php echo $html->link(
				'Delete', 
				array('action'=>'delete/'.$u['Contact']['id']), 
				null, 
				'Are You Sure You Want To Delete This Contact?'
			); ?>
        </td>
    </tr>
<?php } ?>
</table>
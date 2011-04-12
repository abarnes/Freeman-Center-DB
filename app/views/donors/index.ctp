<h2>Donors</h2>

<?php echo $html->link('Add Donor',array('action'=>'add')); ?>
<br/>

<table>
    <tr>
        <th>
            Name
        </th>
	<th>
	    Added
	</th>
        <th>
            Action
        </th>
    </tr>
<?php foreach ($donor as $u) { ?>
    <tr>
        <td>
            <?php echo $u['Donor']['name']; ?>
        </td>
	<td>
	    <?php echo date('m-d-Y',strtotime($u['Donor']['created'])); ?>
	</td>
        <td>
	    <?php echo $html->link('Record Contact',array('controller'=>'contacts','action'=>'add/'.$u['Donor']['id'])); ?>
	    <?php if ($u['Donor']['email']!='') { ?>
		<a href="mailto:<?php echo $u['Donor']['email']; ?>">Email</a>
	    <?php } ?>
            <?php echo $html->link('Edit',array('action'=>'edit/'.$u['Donor']['id'])); ?>
            <?php echo $html->link(
				'Delete', 
				array('action'=>'delete/'.$u['Donor']['id']), 
				null, 
				'Are You Sure You Want To Delete This Donor?'
			); ?>
        </td>
    </tr>
<?php } ?>
</table>
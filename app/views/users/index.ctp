<h2>Users</h2>

<?php echo $html->link('Add User',array('action'=>'add')); ?>
<br/>

<table>
    <tr>
        <th>
            User
        </th>
        <th>
            Action
        </th>
    </tr>
<?php foreach ($user as $u) { ?>
    <tr>
        <td>
            <?php echo $u['User']['username']; ?>
        </td>
        <td>
            <?php echo $html->link('Edit',array('action'=>'edit/'.$u['User']['id'])); ?>
            <?php echo $html->link(
				'Delete', 
				array('action'=>'delete/'.$u['User']['id']), 
				null, 
				'Are You Sure You Want To Delete This User?'
			); ?>
        </td>
    </tr>
<?php } ?>
</table>
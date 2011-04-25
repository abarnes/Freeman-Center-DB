<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>

<h2>Users</h2>

<div class="link">
<?php echo $html->link('Add User',array('action'=>'add')); ?>
</div>
<br/>

<table>
    <tr>
	<td><?php echo $this->Paginator->sort('Username', 'User.username'); ?>
	</td>
	<td>Action
	</td>
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

<div style="width:200px;text-align:center;margin-left:auto;margin-right:auto;" class="link">
    <!-- Shows the page numbers -->
    <?php echo $this->Paginator->prev('<< Previous', null, null, array('class' => 'disabled')); ?>
    <span style="margin-left:3px;"><?php echo $this->Paginator->numbers(); ?></span>
    <!-- Shows the next and previous links -->
    <?php echo $this->Paginator->next('Next >>', null, null, array('class' => 'disabled')); ?><br/><br/> 
    <!-- prints X of Y, where X is current page and Y is number of pages -->
    <h6><?php echo $this->Paginator->counter(); ?></h6>
</div>
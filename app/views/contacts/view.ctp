<h2><?php echo $e['Event']['name']; ?></h2>

<?php echo $html->link('Edit Event',array('action'=>'edit/'.$e['Event']['id'])); ?>
<br/>

<table>
    <tr>
        <td>
            Date
        </td>
        <td>
            <?php echo date('d-m-Y',strtotime($e['Event']['date'])); ?>
        </td>
    </tr>
    <tr>
        <td>
            Attendees:
        </td>
        <td>
        <?php foreach ($e['Donor'] as $d) {
            echo $d['name'];
        } ?>
        </td>
    </tr>
</table>
        


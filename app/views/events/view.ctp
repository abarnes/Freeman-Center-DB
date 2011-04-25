<h2><?php echo $e['Event']['name']; ?></h2>

<div class="link">
<a href="javascript: history.go(-1)"><< Back</a>
<span style="margin-left:30px;"><?php echo $html->link('Edit Event',array('action'=>'edit/'.$e['Event']['id'])); ?></span>
</div>
<br/>

<table>
    <tr>
        <td>
            Date:
        </td>
        <td>
            <?php echo date('d-m-Y',strtotime($e['Event']['date'])); ?>
        </td>
    </tr>
    <tr>
        <td>
            Total Donations:
        </td>
        <td>
            $<?php echo $sum; ?>
        </td>
    </tr>
    <tr>
        <td>
            Attendees:
        </td>
        <td>
        <?php foreach ($e['Donor'] as $d) {
            echo $d['name'].'<br/>';
        } ?>
        </td>
    </tr>
</table>
        


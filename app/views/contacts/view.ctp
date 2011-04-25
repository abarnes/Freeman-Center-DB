<h2>Contact Details</h2>

<div class="link">
<a href="javascript: history.go(-1)"><< Back</a>
<span style="margin-left:30px;"><?php echo $html->link('Edit Contact',array('action'=>'edit/'.$e['Contact']['id'])); ?></span>
</div>
<br/>

<table>
    <tr>
        <td>
            Date:
        </td>
        <td>
            <?php echo date('F j, Y',strtotime($e['Contact']['date'])); ?>
        </td>
    </tr>
    <tr>
        <td>
            Type:
        </td>
        <td>
            <?php echo $e['Contact']['type']; ?>
            <?php if ($e['Contact']['type']=='at event') {
                    echo ' - '.$e['Event']['name'];
                } ?>
        </td>
    </tr>
    <tr>
        <td>
            Donation:
        </td>
        <td>
            $<?php echo $e['Contact']['donation']; ?>
        </td>
    </tr>
</table>
        


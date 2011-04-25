<h2><?php echo $donor['Donor']['name']; ?></h2>
<?php if ($donor['Donor']['no_contact']) { ?>
    <h4 style="color:red;"><em>Donor Requested No Contact</em></h4>
<?php } ?>

<div class="link">
<a href="javascript: history.go(-1)"><< Back</a>
<span style="margin-left:30px;"><?php echo $html->link('Edit Donor',array('action'=>'edit/'.$donor['Donor']['id'])); ?></span>
<?php if ($donor['Donor']['no_contact']=='0') { ?>
    <span style="margin-left:30px;"><?php echo $html->link('Stop Contact',array('action'=>'stop/'.$donor['Donor']['id'])); ?></span>
<?php } else { ?>
    <span style="margin-left:30px;"><?php echo $html->link('Resume Contact',array('action'=>'start/'.$donor['Donor']['id'])); ?></span>
<?php } ?>
</div>
<br/>

<div style="width:48%;float:left;">
    <h3>Personal Information</h3>
<table>
    <tr>
        <td>
            Primary Phone Number:
        </td>
        <td>
            <?php echo $donor['Donor']['primary_phone']; ?>
        </td>
    </tr>
    <?php if ($donor['Donor']['secondary_phone']!='') { ?>
    <tr>
        <td>
            Secondary Phone Number:
        </td>
        <td>
            <?php echo $donor['Donor']['secondary_phone']; ?>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td>
            Address:
        </td>
        <td>
            <?php echo $donor['Donor']['address'].'<br/>'.$donor['Donor']['city'].', '.$donor['Donor']['state'].'<br/>'.$donor['Donor']['zip']; ?>
        </td>
    </tr>
    <tr>
        <td>
            Email:
        </td>
        <td>
            <a href="mailto:<?php echo $donor['Donor']['email']; ?>"><?php echo $donor['Donor']['email']; ?></a>
        </td>
    </tr>
    <tr>
        <td>
            Notes:
        </td>
        <td>
            <?php echo $donor['Donor']['notes']; ?>
        </td>
    </tr>
    <tr>
        <td>
            Number of Donations:
        </td>
        <td>
            <?php echo $donation_num; ?>
        </td>
    </tr>
    <tr>
        <td>
            Total Donations:
        </td>
        <td>
            $<?php echo $donation_sum; ?>
        </td>
    </tr>
    <tr>
        <td>
            Added to System:
        </td>
        <td>
            <?php echo date('F j, Y',strtotime($donor['Donor']['created'])); ?>
        </td>
    </tr>
</table>

<h3>Contact Information</h3>
<table>
    <tr>
        <td>
            Last Contacted:
        </td>
        <td>
            <?php echo $last; ?>
        </td>
    </tr>
    <tr>
        <td>
            Last Phone Contact:
        </td>
        <td>
            <?php echo $lastph; ?>
        </td>
    </tr>
    <tr>
        <td>
            Last Email Contact:
        </td>
        <td>
            <?php echo $lastem; ?>
        </td>
    </tr>
    <tr>
        <td>
            Last Mail Contact:
        </td>
        <td>
            <?php echo $lastm; ?>
        </td>
    </tr>
    <tr>
        <td>
            Last Donation:
        </td>
        <td>
            <?php echo $lastd; ?>
        </td>
    </tr>
    <tr>
        <td>
            Last Event Attended:
        </td>
        <td>
            <?php echo $lastev; ?>
        </td>
    </tr>
</table>

</div>

<div style="width:48%;float:right;">
    <h3>Contact Timeline</h3>
<table>
    <tr>
        <th>
            Date
        </th>
        <th>
            Type
        </th>
        <th>
            Donation
        </th>
    </tr>
    <?php foreach ($each as $e) { ?>
        <tr>
            <td>
                <?php echo date('F j, Y',strtotime($e['Contact']['date'])); ?>
            </td>
            <td>
                <?php echo $e['Contact']['type']; ?>
                <?php if ($e['Contact']['type']=='at event') {
                    echo ' - '.$e['Event']['name'];
                } ?>
            </td>
            <td>
                <?php
                if ($e['Contact']['donation']!='0') {
                    echo '$'.$e['Contact']['donation'];
                } else {
                    echo 'none';
                }
                ?>
            </td>
        </tr>
    <?php } ?>
</table>
</div>

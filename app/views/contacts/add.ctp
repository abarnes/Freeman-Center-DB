<div style="width:100%;margin-right:auto;margin-left:auto;text-align:center;">
    
    <table style="border:0px solid black;margin-right:auto;margin-left:auto;">
    
    <?php echo $form->create('Contact', array('action' => 'add')); ?>
    
    <?php if ($def!='') { ?>
        <tr><td style="text-align:right;font-size:80%;">Donor: </td><td><?php echo $form->input('donor_id', array( 'label' => '','default'=>$def)); ?></td></tr>
    <?php } else { ?>
        <tr><td style="text-align:right;font-size:80%;">Donor: </td><td><?php echo $form->input('donor_id', array( 'label' => '')); ?></td></tr>
    <?php } ?>    
    
    <tr><td style="text-align:right;font-size:80%;">Date: </td><td><?php echo $form->input('date', array( 'label' => '')); ?></td></tr>
    <div id="1" class="hide">
        <tr><td style="text-align:right;font-size:80%;">Type: </td><td><?php echo $form->input('type', array( 'label' => '','id'=>'typ','onchange'=>'change()','options'=>array('email'=>'email','phone'=>'phone','mail'=>'mail','in person'=>'in person','at event'=>'at event','other'=>'other'))); ?></td></tr>
    </div>
    <tr><td style="text-align:right;font-size:80%;">Event (if contacted at an event): </td><td><?php echo $form->input('ev', array( 'label' => '','options'=>$events,'default'=>'0')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Donation: $</td><td><?php echo $form->input('donation', array( 'label' => '')); ?></td></tr>
    <tr><td style="text-align:right;font-size:80%;">Notes: </td><td><?php echo $form->input('notes', array('label'=>'')); ?></td></tr>
    <tr><td></td><td>
    <?php echo $form->end('Submit'); ?>
    <br/>
</td></tr></table>
</div>

<script type="text/javascript">
function change(){
    var selected = document.getElementById('typ').value;
    if (selected=='at event') {
        document.getElementById("1").setAttribute("class", "show");
        //document.getElementById("2").setAttribute("class", "hide");
        //document.getElementById("3").setAttribute("class", "hide");
        //alert(selected);
    } else {
        document.getElementById("1").setAttribute("class", "hide");
    }
}
</script>

    
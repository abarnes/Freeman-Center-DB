<?php

class Contact extends AppModel {
    var $name = 'Contact';
    var $belongsTo = array('Donor','Event');
    
}
?>
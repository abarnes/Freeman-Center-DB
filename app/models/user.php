<?php

class User extends AppModel {
    var $name = 'User';          
    var $validate = array(
        'username' => array(
            'rule' => 'isUnique',
            'message' => 'This Name Has Already Been Taken.  Please Try Another.'
        )
);
}
?>
<?php

class Event extends AppModel {
    var $name = 'Event';
    var $hasMany = 'Contact';
    var $hasAndBelongsToMany = array(
        'Donor' =>
            array(
                'className'              => 'Donor',
                'joinTable'              => 'donors_events',
                'foreignKey'             => 'event_id',
                'associationForeignKey'  => 'donor_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            )
    );
    var $validate = array(
        'name' => array(
           'rule' => array('minLength', 1),
           'required' => true,
           'message' => 'A Name Must Be Provided.'
        )
    );
    
}
?>
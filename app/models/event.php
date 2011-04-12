<?php

class Event extends AppModel {
    var $name = 'Event';   
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
}
?>
<?php

class Donor extends AppModel {
    var $name = 'Donor';
    var $hasMany = 'Contact';
    var $hasAndBelongsToMany = array(
        'Event' =>
            array(
                'className'              => 'Event',
                'joinTable'              => 'donors_events',
                'foreignKey'             => 'donor_id',
                'associationForeignKey'  => 'event_id',
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
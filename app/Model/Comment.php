<?php

class Comment extends AppModel{

	public $hasOne = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'id'
        )
    );

}
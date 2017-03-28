<?php
namespace model;

class target_relation extends \app\model
{
    public static $table = "target_relation";

	public static $CONF_TYPE = [
		'CREATOR' => 0,
		'FOLLOW' => 1
	];    
}
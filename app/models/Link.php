<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/20/2014
 * Time: 11:14 AM
 */

class Link extends Eloquent {
    protected $fillable = array('url', 'hash');
    public $timestamps = false;
} 
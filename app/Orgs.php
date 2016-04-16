<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orgs extends Model
{
    

    	protected $fillable = ['name'];



    	protected $table = 'orgs';

    	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
}

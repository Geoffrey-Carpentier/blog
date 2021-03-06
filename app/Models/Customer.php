<?php

namespace App\Models;
use App\Models\Company;


# use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
	# configure  the model to retrieve an array with data on his construction
	# protected $fillable = ['name', 'email', 'status'];

	#  allow everything, not conventional but convenient for the training
	protected $guarded = [];
    # use HasFactory;

    # default value to prevent error with the object is emptiy and used
    protected $attributes = [
        'status' => False
    ];

    public function scopeStatus($query) {
    	return $query->where('status', True)->get();
    }
     public function company() {
    	return $this->belongsTo(Company::class);
    }
    public function getStatusAttribute($attributes) {
    	return [
    		False => 'inactive',
    		True => 'active'
    	][$attributes];
    }
}

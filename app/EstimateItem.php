<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstimateItem extends Model {
  protected $fillable = [
  	'estimate_id',
  	'job_function',
  	'location',
  	'job_title',
  	'rate',
  	'hours',
  	'allocation',
  ];

  public function estimate() {
  	return $this->belongsTo('Estimate', 'estimate_id');
  }
}

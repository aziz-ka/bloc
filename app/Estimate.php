<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model {
  protected $fillable = [
  	'master_estimate_id',
  	'is_current',
  	'client_id',
  	'brand_id',
  	'region',
  	'project_type',
  	'estimate_name',
  	'job_number',
  	'level',
  	// 'support_config',
  	'milestone_0',
  	'milestone_25',
  	'milestone_50',
  	'milestone_75',
  	'milestone_100',
  	'status',
  	'revisions',
  	'comment',
  ];

  public function estimateItem() {
  	return $this->hasMany('EstimateItem');
  }
}

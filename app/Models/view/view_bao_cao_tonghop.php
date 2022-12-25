<?php

namespace App\Models\view;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Report;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Session;

class view_bao_cao_tonghop extends Model
{
    protected $table = 'bao_cao_tong_hop';

	protected $fillable=[];
}

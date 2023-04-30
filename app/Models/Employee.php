<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'team_members';
    protected $primaryKey = 'team_member_id';

    public function suppotrteam(){
        return $this->belongsTo('App\Models\SupportTeam','support_team_id')->select('support_team_id','team_name');
    }
}

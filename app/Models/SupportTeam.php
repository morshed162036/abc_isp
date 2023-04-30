<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTeam extends Model
{
    use HasFactory;

    protected $table = 'support_team';
    protected $primaryKey = 'support_team_id';

}

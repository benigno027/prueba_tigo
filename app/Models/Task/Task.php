<?php

namespace App\Models\Task;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kra8\Snowflake\HasShortflakePrimary;
use Wildside\Userstamps\Userstamps;

class Task extends BaseModel
{
    use HasShortflakePrimary;
    use Userstamps;
    use SoftDeletes;

    protected $table = 'tasks';

    protected static $logName = 'tasks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'description',
        'ready',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $dates = [
        'deleted_at',
    ];

    protected $casts = [];
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class BaseModel extends Model
{
    private $userFields = ['id', 'email', 'name'];

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    protected static $logFillable = true;

    protected static $submitEmptyLogs = false;

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by')->select($this->userFields)->withDefault(['name' => '---']);
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by')->select($this->userFields)->withDefault(['name' => '---']);
    }

    public function deleter()
    {
         return $this->belongsTo(User::class, 'deleted_by')->select($this->userFields)->withDefault(['name' => '---']);
    }

    public function getCreatedAtAttribute($date)
    {
        if (!empty($date))
        {
            return date('d/m/Y h:i:s A', strtotime($this->attributes['created_at']));
        }
    }

    public function getUpdatedAtAttribute($date)
    {
        if (!empty($date))
        {
            return date('d/m/Y h:i:s A', strtotime($this->attributes['updated_at']));
        }
    }
}
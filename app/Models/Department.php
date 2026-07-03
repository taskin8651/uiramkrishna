<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Department extends Model
{
    protected $fillable = [
        'department_stream_id',
        'sort_order',
        'name',
        'slug',
        'link_url',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($department) {
            if (blank($department->slug) && filled($department->name)) {
                $department->slug = Str::slug($department->name);
            }
        });
    }

    public function stream()
    {
        return $this->belongsTo(DepartmentStream::class, 'department_stream_id');
    }

    public function staffMembers()
    {
        return $this->hasMany(StaffMember::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function activeStaffMembers()
    {
        return $this->hasMany(StaffMember::class)
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
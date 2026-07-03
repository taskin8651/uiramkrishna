<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentStream extends Model
{
    protected $fillable = [
        'sort_order',
        'faculty_label',
        'name',
        'icon_class',
        'description',
        'type_label',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function departments()
    {
        return $this->hasMany(Department::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function activeDepartments()
    {
        return $this->hasMany(Department::class)
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function staffMembers()
    {
        return $this->hasManyThrough(
            StaffMember::class,
            Department::class,
            'department_stream_id',
            'department_id',
            'id',
            'id'
        );
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
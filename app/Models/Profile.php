<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'text']);
        // Chain fluent methods for configuration options
    }

    protected $fillable = [
        'user_id',
        'name',
        'mobile',
        'gender',
        'date_of_birth',
        'avatar',
        'url_website',
        'url_github',
        'url_facebook',
        'url_twitter',
        'url_instagram',
        'url_linkedin',
        'address',
        'bio',
        'user_metadata',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
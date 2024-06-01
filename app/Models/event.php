<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model // Adjust the class name to follow the naming convention
{
    use HasFactory;
    
    // Assuming you've added a 'user_id' column to your events table
    protected $fillable = ['title', 'description', 'type', 'start_date', 'end_date', 'user_id'];
    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
    ];
    
    /**
     * Get the user that created the event.
     */
    public function users()
{
    return $this->belongsToMany(User::class);
}

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
    
    // Uncomment or adjust your category relationship if needed
    /*
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    */
}

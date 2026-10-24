<?php

namespace App\Models;

use App\Enums\Priority;
use App\Enums\Status;
use App\Enums\Status as EnumsStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'priority',
        'category_id',
       
    ];
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

  
    public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
  

    public function requester():BelongsTo
    {
        return $this->belongsTo(User::class ,'requester_id');
    } 

    public function assignee():BelongsTo
    {
        return $this->belongsTo(User::class ,'assignee_id');
    }
    protected function casts(): array
{
    return [
        'status' => Status::class,
        'priority' => Priority::class,
        'closed_at' => 'datetime',
    ];
}
public function comments():HasMany
{
    return $this->hasMany(Comment::class);
}

public function attachments():HasMany
{
    return $this->hasMany(TicketAttachment::class);
}
    
}
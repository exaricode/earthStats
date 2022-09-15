<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalendarEvent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getItems() {
        return CalendarEvent::all();
        // return CalendarEvent::where(User::id, 'user_id')->get()
    }

    public static function createItem($event) {
        // $id = Auth::user()->id;
        return CalendarEvent::create([
            'user_id' => $event->user_id,
            'title' => $event->title,
            'desc' => $event->desc,
            'start_date' => $event->start_date,
            'end_date' => $event->end_date,
            'alarm_time' => $event->alarm_time,
            'reminder' => $event->reminder
        ]);
    }
}

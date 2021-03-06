<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice', 'campaign_id', 'donatur_id', 'amount', 'pray', 'status', 'snap_token'
    ];

     /**
     * hidden
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * campaign
     *
     * @return void
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

   /**
     * donatur
     *
     * @return void
     */
    public function donatur()
    {
        return $this->belongsTo(Donatur::class);
    }
 
     /**
     * getImageAttribute
     *
     * @param  mixed $image
     * @return void
     */
    public function getImageAttribute($image)
    {
        return asset('storage/categories/'.$image);
    }
}

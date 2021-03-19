<?php

namespace App\Models;

use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use willvincent\Rateable\Rateable;

class SellApartment extends Model
{
    use Sluggable;
    use Favoriteable;
    use Rateable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    protected $fillable = ['location','town','address','number_of_rooms_id','number_of_separated_rooms_id','total_area','living_area','kitchen_area','sells_area','floor',
        'total_floors','balcony_id','bathroom_id','apartment_renovation_id','type_of_walls_id','year_of_construction','year_of_overhaul','description','youtube_video',
        'price','terms_of_a_transaction_id','contacts_id','fridge','elevator','internet','furniture','washer','rent_per_month','students','with_animals','with_kids','number_of_berths_id',
        'dishes','microwave','tv','wifi','jacuzzi','rent_per_day','rent_per_night','rent_per_hour','slug', 'town_id', 'images_id', 'is_banned', 'is_fixed'];


    public function sluggable()
    {
        return [
          'slug' => [
              'source' => 'address'
          ]
    ];

    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'images_id');
    }

    public function town()
    {
        return $this->belongsTo(Town::class, 'town_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'number_of_rooms_id');
    }

    public function separatedRoom()
    {
        return $this->belongsTo(SeparatedRoom::class, 'number_of_separated_rooms_id');
    }

    public function bathroom()
    {
        return $this->belongsTo(Bathroom::class, 'bathroom_id');
    }

    public function balcony()
    {
        return $this->belongsTo(Balcony::class, 'balcony_id');
    }

    public function repair()
    {
        return $this->belongsTo(Repair::class, 'apartment_renovation_id');
    }

    public function wall()
    {
        return $this->belongsTo(Wall::class, 'type_of_walls_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'terms_of_a_transaction_id');
    }

    public function berth()
    {
        return $this->belongsTo(Berth::class, 'number_of_berths_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'contacts_id');
    }

}

<?php

namespace App\Helpers;

//use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;


trait UuidForKey
{
    /**
     * Boot the Uuid trait for the model.
     *
     * @return void
     */
    public static function bootUuidForKey()
    {
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    /**
     * Get the casts array.
     *
     * @return array
     */
    public function getCasts()
    {
        return $this->casts;
    }
}
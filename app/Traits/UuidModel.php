<?php


namespace App\Traits;


use Webpatser\Uuid\Uuid;

trait UuidModel
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = Uuid::generate(4)->string;
        });
    }
}

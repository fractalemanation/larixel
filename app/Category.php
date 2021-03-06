<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
	protected $fillable = ['title', 'slug', 'parent_id', 'published', 'created_by', 'modified_by'];

    public function setSlugAttribute($value) {
      $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function children() {
    	return $this->hasMany(self::class, 'parent_id');//Один ко многим, 3-ий параметр по умолчанию id; self::class = 'App\Category'; hasOne('App\Phone', 'friend_id', 'id') - найти телефон друга; belongsTo('App\Friend', 'id', 'friend_id') - найти друга которому принадлежит телефон;
    }

    public function articles() {
    	return $this->morphedByMany('App\article', 'categoryable');//Обратная полиморфная связь, многие ко многим
    }

    public function scopeLastCategories($query, $count) {
    	return $query->orderBy('created_at', 'desc')->take($count)->get();//take принимает переменную с количеством результатов
    }
}

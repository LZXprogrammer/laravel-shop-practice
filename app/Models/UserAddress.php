<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province',
        'city',
        'district',
        'address',
        'zip',
        'contact_name',
        'contact_phone',
        'last_used_at',
    ];

    // 表示 last_used_at 是一个日期字段
    protected $dates = ['last_used_at'];

    /**
     * 这里是模型关联
     * 一对多关系
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * 创建了一个访问器，获取全部地址
     * 就是把所有地址先行拼接，省的以后再拼接
     */
    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }
}

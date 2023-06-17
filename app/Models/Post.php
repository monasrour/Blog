<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

   protected $fillable=[
        'title',
        'description',
        'user_id'
    ];

    // way to create foreign key constraints in code

    // public function myUserRelation(){
            //my_User_Relation_id-----> مش هتلاقيه في الجدول عشان كدا لازم احدد الفورين كي
    //     return $this->belongsTo(User::class,'user_id');
    // }

        // another way to create foreign key constraints and the best way 
     public function user(){
        // الفرام وورك باي ديفلت تاخد اسم الفانكشن وبتيضف عليه الأي دي
        //user_id
        return $this->belongsTo(User::class);
    }
}

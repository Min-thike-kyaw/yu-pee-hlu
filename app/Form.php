<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
            'age' ,
            'city' ,
            'acc_name' ,
            'gender',
            'gender_you_want',
            'look_you_want' ,
            'email',
            'skin_tone_you_want',
            'height_you_want',
            'your_height' ,
            'your_body_shape',
            'body_shape_you_want',
            'your_look',
            'age_you_want',
            "your_height_by_inch",
            "code"
    ];
    
    //Partner
    public function getPartnerGenderAttribute()
    {
        return config("form")['gender_you_want'][$this->gender_you_want];
    }

    public function getPartnerSkinToneAttribute()
    {
        return config("form")['skin_tone_you_want'][$this->skin_tone_you_want];
    }

    public function getPartnerHeightAttribute()
    {
        return config("form")['height_you_want'][$this->height_you_want];
    }

    public function getPartnerBodyShapeAttribute()
    {
        return config("form")['body_shape_you_want'][$this->body_shape_you_want];
    }


    //You
    public function getYourLookTextAttribute()
    {
        return config("form")['your_look'][$this->your_look];
    }
    public function getYourGenderTextAttribute()
    {
        return config("form")['gender'][$this->gender];
    }
    public function getYourBodyShapeTextAttribute()
    {
        return config("form")['your_body_shape'][$this->your_body_shape];
    }

    //Other

    public function getFeetInchAttribute()
    {    
        return [
            "feet"  => (int) ($this->your_height_by_inch / 12),
            "inches" => $this->your_height_by_inch % 12,
        ];
    }


    
}

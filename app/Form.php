<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $appends = [
        "partner_gender",
        "partner_skin_tone",
        "partner_height",
        "partner_body_shape",
        "your_gender_text",
        "your_body_shape_text",
        "feet_inch",
    ];

    protected $fillable = [
            'age' ,
            'city' ,
            'acc_name' ,
            'acc_link',
            'photo',
            'gender',
            'gender_you_want',
            'your_look',
            'other_looks_you_want' ,
            'email',
            'skin_tone_you_want',
            'your_skin_tone',
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
    
    public function getYourGenderTextAttribute()
    {
        return config("form")['gender'][$this->gender];
    }
    public function getYourSkinToneTextAttribute()
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

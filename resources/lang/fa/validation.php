<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'required'=> 'فیلد :attribute الزامی است.',
    'date'    => 'فیلد :attribute باید با فرمت تاریخ وارد شود.',
    'integer' => 'فیلد :attribute عددی نیست.',
    'unique'  => 'فیلد :attribute یکتا نیست .',
    'max'     => [
        'string'  => 'فیلد :attribute نباید بیشتر از :max کاراکتر باشد.',
    ],

    'size' => [
        'string' => 'فیلد :attribute باید :size کاراکتر باشد.',
    ],
    'min' => [
        'string' => ':attribute حداقل باید :min کاراکتر باشد.',
    ],
    'string' => 'فیلد :attribute باید از نوع رشته ای باشد.',
    'regex' => 'فرمت :attribute نادرست است.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        "name"  => "نام",
        "pages" => "صفحه",
        "isbn"  => "شابک",
        "price" => "قیمت",
        "published_at" => "زمان انتشار",
        "name" => "نام",
        "phone" => "تلفن",
        "username" => "نام کاربری",
        "national_id" => "کد ملی",
        "password" => "گذر واژه"
    ],

];

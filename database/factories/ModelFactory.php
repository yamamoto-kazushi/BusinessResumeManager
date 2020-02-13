<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $gender = $faker->randomElement(["1", "2"]);
    $school = $faker->randomElement(["〇〇〇大学 ×××学部", "△△△高校 □□□科", "AAA大学 BBB学部", "CCC大学 DDD学部"]);
    $station  = $faker->randomElement(["新宿", "池袋", "お台場", "秋葉原", "六本木", "武蔵小杉", "横浜"]);
    $retention1 = $faker->randomElement(["普通自動車第一種運転免許,", "普通二輪免許,",""]);
    $retention2 = $faker->randomElement(["基本情報技術者,","応用情報技術者,","データベーススペシャリスト,",""]);
    $retention3 = $faker->randomElement(["日本漢字能力検定1級","実用英語技能検定1級","日本商工会議所簿記検定1級",""]);

    return [
        "emproyee_no" => $faker->bothify('?#####'),
        "name" => $faker->name($gender),
        "name_kana" => $faker->kanaName($gender) ,
        "birthday" => $faker->dateTimeBetWeen("-50years", "-20years")->format('Y-m-d'),
        "gender" => $gender,
        "address" => $faker->address,
        "country" => $faker->country,
        "initial" => "",
        "education" => $school,
        "graduate" => $faker->numberBetween($min = 1980, $max = 2000),
        "station" => $station,
        "qualifications" => $retention1.$retention2.$retention3,
        "email" => $faker->unique()->safeEmail,
        "password" => $password ?: $password = bcrypt('secret'),
        "login_failed" => 0,
        "admin_flag" => $faker->boolean,
        "last_update_datetime" => "",
        "delete_flag" => 0,
    ];
});

$factory->define(App\ResumeList::class, function (Faker\Generator $faker) {
    $users = App\User::pluck('emproyee_no')->all();
    $gender = $faker->randomElement(["male", "female"]);
    $kind = $faker->randomElement(["証券", "銀行", "通信"]);
    $month = rand(1,12);
    $type = $faker->randomElement(["SE", "PG", "PL"]);
    $start_year = $faker->numberBetween(1990, 2019);

    return [
        "emproyee_no" => $faker->randomElement($users),
        "name" => $faker->name($gender),
        "num" => $faker->randomDigitNot(0),
        "kind" => $kind,
        "comment" => $faker->text,
        "start_year" => $start_year,
        "start_month" => $month,
        "end_year" => $start_year + rand(1, 3),
        "end_month" => $month,
        "work_research_flag" => $faker->boolean,
        "work_requirement_flag" => $faker->boolean,
        "work_bd_flag" => $faker->boolean,
        "work_dd_flag" => $faker->boolean,
        "work_pg_flag" => $faker->boolean,
        "work_t_flag" => $faker->boolean,
        "work_om_flag" => $faker->boolean,
        "work_other_flag" => $faker->boolean,
        "system" => "ｱﾌﾟﾘ",
        "type" => $type,
        "whole_size" => $faker->randomDigit,
        "team_size" => $faker->randomDigit,
        "os" => "Linux",
        "lang" => "PHP",
        "mw" => "WebSphere,WAS,Tomcat,SVN",
        "fw" => "Laravel",
        "tool" => "PHPStorm",
        "last_update_datetime" => "",
        "delete_flag" => 0
    ];
});
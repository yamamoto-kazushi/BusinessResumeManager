<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                "id" => "1",
                "emproyee_no" => "A901",
                "name" => "山田太郎",
                "name_kana" => "1",
                "birthday" => "1988/01/01",
                "gender" => "1",
                "address" => "東京都港区南青山",
                "country" => "日本",
                "initial" => "",
                "education" => "xxx大学 yyy学部",
                "graduate" => "2010",
                "station" => "表参道",
                "qualifications" => "普通自動車免許",
                "email" => "",
                "password" => "",
                "login_failed" => "0",
                "admin_flag" => "0",
                "last_update_datetime" => new Datetime(),
                "delete_flag" => "0",
            ]
        ]);
    }
}

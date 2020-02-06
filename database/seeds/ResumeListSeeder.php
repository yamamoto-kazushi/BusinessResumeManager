<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class ResumeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ownersテーブルにインサートする.
        DB::table("resume_list")->insert([
            [
                "id" => "1",
                "emproyee_no" => "A901",
                "name" => "山田太郎",
                "num" => "1",
                "kind" => "銀行",
                "comment" => "某信託銀行のWEBシステム保守\n・WEBバンキングシステム全般の保守。\n\n【担当業務】\n・ローカル環境においてアプリをWASで稼働させるためのインフラ構築、環境構築手順書の作成を行う。\n\n・Windows、Macブラウザバージョンアップにおける全機能全画面動作確認を行い、不具合発覚時は不具合調査を行い、対応、修正案策定および対応工数の算出を行う。\n全画面確認後、要件定義から着手。\n開発未経験のメンバを下に置き、教育しながらの業務。",
                "start_year" => "2017",
                "start_month" => "1",
                "end_year" => "2017",
                "end_month" => "5",
                "work_research_flag" => "1",
                "work_requirement_flag" => "1",
                "work_bd_flag" => "1",
                "work_dd_flag" => "1",
                "work_pg_flag" => "1",
                "work_t_flag" => "1",
                "work_om_flag" => "1",
                "work_other_flag" => "1",
                "system" => "ｱﾌﾟﾘ",
                "type" => "SE",
                "whole_size" => "15",
                "team_size" => "2",
                "os" => "Windows10",
                "lang" => "Java,Jsp,JavaScript,SQL",
                "mw" => "WebSphere,WAS,Tomcat,SVN",
                "fw" => "struts1.1",
                "tool" => "Eclipse,FFFTP,Tera Term",
                "last_update_datetime" => new DateTime(),
                "delete_flag" => "0",
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ]
        ]);
    }
}

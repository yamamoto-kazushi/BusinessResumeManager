<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_list', function (Blueprint $table) {
            $table->integer('id')->comment('サロゲートキー');
            $table->string('emproyee_no', 6)->comment('社員番号');
            $table->string('name',100)->comment('氏名');
            $table->integer('num')->index('index_num')->comment('項番');
            $table->string('kind',20)->comment('業種');
            $table->text('comment')->comment('業務内容');
            $table->string('start_year',4)->comment('従事開始年');
            $table->integer('start_month')->comment('従事開始月');
            $table->string('end_year',4)->comment('従事終了年');
            $table->integer('end_month')->comment('従事終了月');
            $table->boolean('work_research_flag')->default(false)->comment('担当区分_計画調査分析フラグ');
            $table->boolean('work_requirement_flag')->default(false)->comment('担当区分_要件定義フラグ');
            $table->boolean('work_bd_flag')->default(false)->comment('担当区分_基本設計フラグ');
            $table->boolean('work_dd_flag')->default(false)->comment('担当区分_詳細設計フラグ');
            $table->boolean('work_pg_flag')->default(false)->comment('担当区分_製造フラグ');
            $table->boolean('work_t_flag')->default(false)->comment('担当区分_テストフラグ');
            $table->boolean('work_om_flag')->default(false)->comment('担当区分_保守フラグ');
            $table->boolean('work_other_flag')->default(false)->comment('担当区分_その他フラグ');
            $table->string('system',20)->comment('システム');
            $table->boolean('type')->comment('形態');
            $table->integer('whole_size')->comment('PJ全体規模（人数）');
            $table->integer('team_size')->comment('チーム開発規模（人数）');
            $table->string('os')->comment('OS,DB');
            $table->text('lang')->comment('言語');
            $table->text('mw')->comment('M/W');
            $table->text('fw')->comment('フレームワーク');
            $table->text('tool')->comment('ツール');
            $table->dateTime('last_update_datetime')->nullable(true)->comment('最終更新日時');
            $table->boolean('delete_flag')->defalut(false)->comment('削除フラグ');
            $table->timestamps();
            $table->primary(['id', 'emproyee_no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resume_list');
    }
}

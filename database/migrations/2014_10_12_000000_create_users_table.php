<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('サロゲートキー');
            $table->string('emproyee_no', 6)->comment('社員番号');
            $table->string('name',100)->comment('氏名');
            $table->string('name_kana',100)->comment('氏名かな');
            $table->date('birthday')->comment('生年月日');
            $table->string('gender',1)->comment('性別');
            $table->string('address',200)->comment('現住所');
            $table->string('country',20)->comment('国籍');
            $table->string('initial',10)->nullable(true)->comment('イニシャル');
            $table->string('education',200)->comment('最終学歴（学校名・学部学科）');
            $table->string('graduate',10)->comment('卒業年度');
            $table->string('station',50)->comment('最寄駅');
            $table->text('qualifications')->nullable(true)->comment('資格');
            $table->string('email',200)->unique()->comment('メールアドレス');
            $table->string('password',30)->comment('パスワード');
            $table->integer('login_failed')->comment('ログイン失敗回数');
            $table->boolean('admin_flag')->defalut(false)->comment('管理者フラグ');
            $table->dateTime('last_login_datetime')->nullable(true)->comment('最終ログイン日時');
            $table->dateTime('last_update_datetime')->nullable(true)->comment('最終更新日時');
            $table->boolean('delete_flag')->defalut(false)->comment('削除フラグ');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

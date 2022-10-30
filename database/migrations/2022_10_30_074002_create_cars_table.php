<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task', 255)->nullable();//用務先
            $table->string('destination', 255)->nullable(); //用務内容
            $table->string('distance', 20)->nullable();//距離数
            // $table->string('number', 20)->constrained('personals');//社員番号
            // $table->string('name', 50);//運転者名
            $table->string('headcount', 30)->nullable();//人数
            $table->string('oil')->nullable();//給油
            $table->text('remarks')->nullable();//備考
            $table->foreignId('personal_id')->constrained('personals');
            $table->timestamps();//出発日時//帰庁日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }


}

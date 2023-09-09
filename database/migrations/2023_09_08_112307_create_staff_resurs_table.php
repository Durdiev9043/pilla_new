<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffResursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_resurs', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('staff_id');
            $table->timestamps();
            $table->double('olgan_gr')->nullable();
            $table->integer('algan_qutisi')->nullable();
            $table->double('topshirish_rejasi')->nullable();
            $table->double('topshirgani')->nullable();
            $table->double('bugdoy')->nullable();
            $table->double('beda')->nullable();
            $table->double('sabzovod')->nullable();
            $table->double('poliz')->nullable();
            $table->double('kungaboqar')->nullable();
            $table->double('kartoshka')->nullable();
            $table->double('piyoz')->nullable();
            $table->double('sarimsoq_piyoz')->nullable();
            $table->double('sholi')->nullable();
            $table->double('avans')->nullable();
            $table->foreign('staff_id')->references('id')->on('staff');


        });
    }

//'toladi',
//        'algan_qutisi',
//        'olgan_gr',
//        'topshirish_rejasi',
//        'topshirgani',
//        'bugdoy',
//        'beda',
//        'sabzovod',
//        'poliz',
//        'kungaboqar',
//        'kartoshka',
//        'piyoz',
//        'sarimsoq_piyoz',
//        'sholi',
//        'ozuqa',
//        'izoh',
//        'avans',
//        'resurs',
//        'subsedya'
//        'yil_boshiga',

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_resurs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Facultet;
use App\Models\Group;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Facultet::class)->constrained();
            $table->string('name');
            $table->timestamps();
        });

        Group::create([
            'facultet_id'=>1,
            'name'=>'Defirencial 1A'
        ]);
        Group::create([
            'facultet_id'=>1,
            'name'=>'Defirencial 1B'
        ]);
        Group::create([
            'facultet_id'=>1,
            'name'=>'Matanaliz 1A'
        ]);

        Group::create([
            'facultet_id'=>2,
            'name'=>'Menedjment 1A'
        ]);
        Group::create([
            'facultet_id'=>2,
            'name'=>'Menedjment 1B'
        ]);
        Group::create([
            'facultet_id'=>2,
            'name'=>'Finans 1A'
        ]);


        Group::create([
            'facultet_id'=>3,
            'name'=>'Topraqtaniw 1A'
        ]);
        Group::create([
            'facultet_id'=>3,
            'name'=>'Biologya 1B'
        ]);
        Group::create([
            'facultet_id'=>3,
            'name'=>'Zoologya 1A'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}

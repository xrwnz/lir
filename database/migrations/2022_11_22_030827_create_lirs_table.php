<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lirs', function (Blueprint $table) {
            $table->id('lirid');
            $table->integer('userid');
            $table->date('tglir');
            $table->string('ir', 2);
            $table->time('wktir1');
            $table->time('wktir2');
            $table->string('gembala', 30);
            $table->smallInteger('npria');
            $table->smallInteger('nwanita');
            $table->smallInteger('nhadir');
            $table->smallInteger('jbpria');
            $table->smallInteger('jbwanita');
            $table->smallInteger('jbhadir');
            $table->smallInteger('lbpria');
            $table->smallInteger('lbwanita');
            $table->smallInteger('lbhadir');
            $table->string('wl', 30);
            $table->time('wl_dtg');
            $table->string('pembicara', 30);
            $table->time('wktbicara1');
            $table->time('wktbicara2');
            $table->string('singer1', 30);
            $table->time('singer1_dtg');
            $table->string('singer2', 30);
            $table->time('singer2_dtg');
            $table->string('pemusik1', 30);
            $table->time('pemusik1_dtg');
            $table->string('pemusik2', 30);
            $table->time('pemusik2_dtg');
            $table->string('pemusik3', 30);
            $table->time('pemusik3_dtg');
            $table->string('pemusik4', 30);
            $table->time('pemusik4_dtg');
            $table->string('pemusik5', 30);
            $table->time('pemusik5_dtg');
            $table->string('pemusik6', 30);
            $table->time('pemusik6_dtg');
            $table->string('penari1', 30);
            $table->time('penari1_dtg');
            $table->string('penari2', 30);
            $table->time('penari2_dtg');
            $table->string('penari3', 30);
            $table->time('penari3_dtg');
            $table->string('penari4', 30);
            $table->time('penari4_dtg');
            $table->string('media1', 30);
            $table->time('media1_dtg');
            $table->string('media2', 30);
            $table->time('media2_dtg');
            $table->string('media3', 30);
            $table->time('media3_dtg');
            $table->string('media4', 30);
            $table->time('media4_dtg');
            $table->string('media5', 30);
            $table->time('media5_dtg');
            $table->string('media6', 30);
            $table->time('media6_dtg');
            $table->string('media7', 30);
            $table->time('media7_dtg');
            $table->string('media8', 30);
            $table->time('media8_dtg');
            $table->string('soundman1', 30);
            $table->time('soundman1_dtg');
            $table->string('soundman2', 30);
            $table->time('soundman2_dtg');
            $table->string('soundman3', 30);
            $table->time('soundman3_dtg');
            $table->string('soundman4', 30);
            $table->time('soundman4_dtg');
            $table->string('lighting1', 30);
            $table->time('lighting1_dtg');
            $table->string('lighting2', 30);
            $table->time('lighting2_dtg');
            $table->boolean('qsuara_a');
            $table->boolean('qsuara_b');
            $table->boolean('qsuara_c');
            $table->boolean('qsuara_d');
            $table->boolean('qsuara_e');
            $table->string('p01', 2);
            $table->decimal('pn01', 2, 1);
            $table->string('pc01', 40);
            $table->string('p02', 2);
            $table->decimal('pn02', 2, 1);
            $table->string('pc02', 40);
            $table->string('p03', 2);
            $table->decimal('pn03', 2, 1);
            $table->string('pc03', 40);
            $table->string('p04', 2);
            $table->decimal('pn04', 2, 1);
            $table->string('pc04', 40);
            $table->string('p05', 2);
            $table->decimal('pn05', 2, 1);
            $table->string('pc05', 40);
            $table->string('p06', 2);
            $table->decimal('pn06', 2, 1);
            $table->string('pc06', 40);
            $table->string('p07', 2);
            $table->decimal('pn07', 2, 1);
            $table->string('pc07', 40);
            $table->string('p08', 2);
            $table->decimal('pn08', 2, 1);
            $table->string('pc08', 40);
            $table->string('p09', 2);
            $table->decimal('pn09', 2, 1);
            $table->string('pc09', 40);
            $table->string('p10', 2);
            $table->decimal('pn10', 2, 1);
            $table->string('pc10', 40);
            $table->string('p11', 2);
            $table->decimal('pn11', 2, 1);
            $table->string('pc11', 40);
            $table->string('p12', 2);
            $table->decimal('pn12', 2, 1);
            $table->string('pc12', 40);
            $table->string('p13', 2);
            $table->decimal('pn13', 2, 1);
            $table->string('pc13', 40);
            $table->string('p14', 2);
            $table->decimal('pn14', 2, 1);
            $table->string('pc14', 40);
            $table->string('p15', 2);
            $table->decimal('pn15', 2, 1);
            $table->string('pc15', 40);
            $table->string('r01', 2);
            $table->decimal('rn01', 2, 1);
            $table->string('r02', 2);
            $table->decimal('rn02', 2, 1);
            $table->string('r03', 2);
            $table->decimal('rn03', 2, 1);
            $table->string('r04', 2);
            $table->decimal('rn04', 2, 1);
            $table->string('r05', 2);
            $table->decimal('rn05', 2, 1);
            $table->string('r06', 2);
            $table->decimal('rn06', 2, 1);
            $table->string('r07', 2);
            $table->decimal('rn07', 2, 1);
            $table->string('r08', 2);
            $table->decimal('rn08', 2, 1);
            $table->string('r09', 2);
            $table->decimal('rn09', 2, 1);
            $table->string('r10', 2);
            $table->decimal('rn10', 2, 1);
            $table->string('ket', 255);
            $table->timestamps();
            $table->unique(['userid', 'tglir', 'ir']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lirs');
    }
};

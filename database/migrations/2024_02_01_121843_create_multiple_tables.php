<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

	    Schema::create('department', function (Blueprint $table) {
		            $table->integer('id_department');
			            $table->string('name', 45);
			        });
	    	
	    	Schema::create('gender', function (Blueprint $table) {
			        $table->integer('id_gender');
				        $table->string('name', 45);
				    });
	    	
	    	Schema::create('type_contagion', function (Blueprint $table) {
			        $table->integer('id_type_contagion');
				        $table->string('name', 45);
				    });
	    	
	    	Schema::create('status', function (Blueprint $table) {
			        $table->integer('id_status');
				        $table->string('name', 45);
				    });
	    	
	    	Schema::create('municipality', function (Blueprint $table){
					$table->integer('id_municipality');
							$table->string('name',200);
							$table->integer('id_department');
								});

	    	Schema::create('cases', function (Blueprint $table) {
					$table->integer('id_case');
							$table->integer('id_municipality');
							$table->integer('age');
									$table->integer('id_gender');
									$table->integer('id_type_contagion');
											$table->integer('id_status');
											$table->dateTime('date_symptom');
													$table->dateTime('date_death');
													$table->dateTime('date_diagnosis');
															$table->dateTime('date_recovery');
															});



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department,gender,type_contagion,status,municipality,cases');
    }
};

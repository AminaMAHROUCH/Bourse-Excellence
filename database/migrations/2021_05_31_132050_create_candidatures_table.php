<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be_candidatures', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('cne'); //
            $table->string('cni'); // 
            $table->string('nom_prenom'); // 
            $table->string('nom_prenomArab'); //
            $table->longText('adresse'); // 
            $table->string('email'); // 
            $table->string('duree_etude'); //
            $table->string('telephone_1'); //
            $table->string('telephone_2')->nullable(); //
            $table->string('filiereBac')->nullable(); // 
            $table->string('lycee'); //
            $table->string('nom_prenom_adherent'); //
            $table->string('nom_prenom_conjoint'); //
            $table->string('nom_prenom_adherentAr'); //
            $table->string('nom_prenom_conjointAr'); //
            $table->string('adresse_parents');
            $table->date('date_naissance'); //
            $table->string('lieu_naissance'); //
            // $table->string('situation_familiale');
            $table->string('sexe'); //
            $table->string('photo')->nullable(); // 
             $table->string('profession_adherent'); //
            $table->string('telephone_conjoint'); //
            $table->string('telephone_adherent'); // 
            $table->string('universite'); //
            $table->string('ecole'); // 
            $table->string('etat_physique'); // 
            $table->string('filiere'); // 
            $table->string('anneUniversitaire'); // 
            $table->string('profession_conjoint')->nullable(); // 
            $table->string('matricule')->nullable(); // 
            $table->string('cni_adherent')->nullable(); // 
            $table->string('mention')->nullable(); // 
            $table->string('anne_bac')->nullable(); //
            $table->string('note')->nullable(); //
            $table->string('AttestationBac')->nullable(); // 
             $table->string('RelvesNote')->nullable(); // 
            $table->string('attestationProfession_adherent')->nullable(); //
            $table->string('attestationProfession_conjoint')->nullable(); //
            $table->string('attest_revenu_mensuel_adh')->nullable(); // 
            $table->string('attest_revenu_mensuel_conj')->nullable(); // 
            $table->string('attestationAdherent')->nullable(); // 
            $table->integer('region_id_etud')->nullable(); // 
            $table->integer('province_id_etud')->nullable(); // 
            // $table->foreign('region_id_etud')->references('id')->on('be_regions');
            // $table->foreign('province_id_etud')->references('id')->on('be_provinces');
            $table->string('region')->nullable(); // 
            $table->string('province')->nullable(); // 
            $table->string('ville')->nullable();  // 
            $table->string('cni_image')->nullable(); //pour etudiant
            $table->integer('nbr_freres')->default(0); // 
            $table->string('parents_deces')->default('ابوين على قيد الحياة')->nullable(); 
            $table->string('promotion')->default('الفوج '.date("Y")); // 
            $table->integer("rib")->nullable();
            $table->date('dateInscription')->nullable(); // 
            $table->string('status')->nullable(); 
            $table->boolean('valider')->nullable()->default(false); 
            $table->timestamps();
            $table->double('salaire')->default(0); // 
            $table->double('salaire_conjoint')->default(0);

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatures');
    }
}
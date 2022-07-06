<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Renouvellement ;
use App\Models\Candidature ;
use App\Models\Region ;
use Illuminate\Http\Request;
use DB;

class ChartDataController extends Controller
{    
	 //region	
	 function getAllRegions(){
		$provinces_candidats = DB::table('be_candidatures')->join('be_regions', 'be_regions.id', 'be_candidatures.region_id_etud')
		->distinct()->pluck('be_regions.nom_region')->toArray();
        return $provinces_candidats;
	}
	function getCandidatsCount( $region) {
		$region_candidat_count = DB::table('be_candidatures')->join('be_regions', 'be_regions.id', 'be_candidatures.region_id_etud')
		->count();
		return $region_candidat_count;
	}
//province
	function getAllProvinces(){
		$provinces_candidats = DB::table('be_candidatures')->join('be_provinces', 'be_provinces.id', 'be_candidatures.province_id_etud')
		->distinct()->pluck('be_provinces.nom_province')->toArray();        
		return $provinces_candidats;
	}

	function getCandidatsCountP( $province) {
		$provinces_candidat_count = DB::table('be_candidatures')->join('be_provinces', 'be_provinces.id', 'be_candidatures.province_id_etud')
		->count();
		return $provinces_candidat_count;
	}
	//sexe
	function getGender(){
		$candidats = DB::table('be_candidatures')->select('sexe')->distinct()->pluck('sexe')->toArray();
		return $candidats;
	}
	
	function getCandidatsCountG($gender) {
		$candidat_count = DB::table('be_candidatures')->select('*')->where( 'sexe', $gender )->groupBy('sexe')->count();
		//dd($candidat_count);
		return $candidat_count;
	}
	//note
	function getNote(){
			$candidats = DB::table('be_candidatures')->select('note')->distinct()->pluck('note')->toArray();
		return $candidats;
	}
	
	function getCandidatsCountN($note) {
	
		$candidat_count = DB::table('be_candidatures')->select('*')->where( 'note', $note )->groupBy('note')->count();
		//dd($candidat_count);
		return $candidat_count;
	}

//reussite
	function getSuccess(){
			$renouv = DB::table('be_renouvellements')->select('status')->distinct()->pluck('status')->toArray();
		return $renouv;
	}
	
	function getCandidatsCountRe($status) {
		$candidat_count = DB::table('be_renouvellements')->select('*')->where( 'status', $status )->groupBy('status')->count();
		return $candidat_count;
	}
	//Age
	function getAge(){
			$age = DB::table('be_candidatures')->select('age')->distinct()->pluck('age')->toArray();
		return $age;
	}
	
	function getCandidatsCountAge($age) {
			$candidat_count = DB::table('be_candidatures')->where( 'age', $age )->groupBy('age')->count();
		return $candidat_count;
	}

	//region Data
	function getRegionCandidatData() {

		$region_candidat_count_array = array();
		$regions = $this->getAllRegions();
		//dd($regions);
		$region_name_array = array();
		if ( ! empty( $regions ) ) {
			foreach ( $regions as $region ){
				$region_candidat_count = $this->getCandidatsCount( $region);
				array_push( $region_candidat_count_array, $region_candidat_count );
				array_push( $region_name_array, $region);

		}
	}
	//dd($region_candidat_count_array);
		$max_no = max( $region_candidat_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$region_candidat_data_array = array(
			'regions' => $region_name_array,
			'candidat_count_data' => $region_candidat_count_array,
			'max' => $max,
		);
//dd($region_candidat_data_array );
		return $region_candidat_data_array ;

    }
//province Data
	function getProvinceCandidatData() {

		$province_candidat_count_array = array();
		$provinces = $this->getAllProvinces();
		$provinces_name_array = array();
		if ( ! empty( $provinces ) ) {
			foreach ( $provinces as $province){
				$province_candidat_count = $this->getCandidatsCountP( $province);
				array_push( $province_candidat_count_array, $province_candidat_count );
				array_push( $provinces_name_array, $province);

		}
	}
		$max_no = max( $province_candidat_count_array);
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$province_candidat_count_array = array(
			'provinces' => $provinces_name_array,
			'provinces_candidat_count_data' => $province_candidat_count_array,
			'maxP' => $max,
		);

		 return $province_candidat_count_array;

    }
	//sexe data
	function getGenderCandidatData() {

		$candidat_count_array = array();
		$genders = $this->getGender();
		$gener_data_array = array();
		if ( ! empty( $genders ) ) {
			foreach ( $genders as $gender){
				$candidat_count = $this->getCandidatsCountG( $gender);
				array_push($candidat_count_array, $candidat_count );
				array_push( $gener_data_array, $gender);

		}
	}
		$max_no = max( $candidat_count_array);
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$candidat_count_array = array(
			'genders' => $gener_data_array,
			'count_gender' => $candidat_count_array,
			'maxP' => $max,
		);

		 return $candidat_count_array;

    }
	//note data
	function getNoteCandidatData() {

		$candidat_count_array = array();
		$notes = $this->getNote();
		$note_data_array = array();
		if ( ! empty( $notes ) ) {
			foreach ( $notes as $note){
				$candidat_count = $this->getCandidatsCountN( $note);
				array_push($candidat_count_array, $candidat_count );
				array_push( $note_data_array, $note);

		}
	}
		$max_no = max( $candidat_count_array);
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$candidat_count_array = array(
			'notes' => $note_data_array,
			'count_note' => $candidat_count_array,
			'maxP' => $max,
		);

		 return $candidat_count_array;

    }
	//Reussite data
	function getReussiteCandidatData() {

		$candidat_count_array = array();
		$sucess = $this->getSuccess();
		$note_data_array = array();
		if ( ! empty( $sucess ) ) {
			foreach ( $sucess as $item){
				$candidat_count = $this->getCandidatsCountRe($item);
				array_push($candidat_count_array, $candidat_count );
				array_push( $note_data_array, $item);

		}
	}
		$max_no = max( $candidat_count_array);
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$candidat_count_array = array(
			'reussite' => $note_data_array,
			'count_reussite' => $candidat_count_array,
			'maxP' => $max,
		);

		 return $candidat_count_array;

    }
		//Age data
		function getAgeCandidatData() {

			$candidat_count_array = array();
			$ages = $this->getAge();
			$note_data_array = array();
			if ( ! empty( $ages ) ) {
				foreach ( $ages as $item){
					$candidat_count = $this->getCandidatsCountAge($item);
					array_push($candidat_count_array, $candidat_count );
					array_push( $note_data_array, $item);
	
			}
		}
			$max_no = max( $candidat_count_array);
			$max = round(( $max_no + 10/2 ) / 10 ) * 10;
			$candidat_count_array = array(
				'ages' => $note_data_array,
				'count_ages' => $candidat_count_array,
				'maxP' => $max,
			);
	
			 return $candidat_count_array;
	
		}
	


   }
<?php 

namespace App\Helpers;
use App\Models\Intermediaire;

class Helper
{
   
    public static function csvToArray($filename = '', $delimiter = ';')
    {
        if(!file_exists($filename) || !is_readable($filename))
		    return FALSE;
	
        $header = NULL;
        $data = array();
        
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
              
                    $data[] = array($row);
            }
        
            fclose($handle);
        }

        return $data;
    }

    public static function collectionToCsv($collection, $fileName)
    {
       // $columns = array_keys($collection->first());
        $headers = array(
            'Content-Type' => 'text/csv',
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        
        $callback = function() use ($fileName, $collection) {
            $handle = fopen('php://output', 'w');

            foreach ($collection as $item) {
                fputcsv($handle, $item, ';');
            }

            fclose($handle);
        };


        return \Illuminate\Support\Facades\Response::stream($callback, 200, $headers);
    }
    public static function exportCsv($type)
    {
       $fileName = 'export.csv';
     
       if($type==350){
        $intermidiares= Intermediaire::where('rib', 'like', '350%')->get();
        }else{
        $intermidiares= Intermediaire::where('rib', '!=', '350%')->get();
        }

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Title', 'Assign');
        $callback = function() use($intermidiares) {
            $file = fopen('php://output', 'w');

            foreach ($intermidiares as $row) {

                fputcsv($file, array($row->cni, $row->rib), ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
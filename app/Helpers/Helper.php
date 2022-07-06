<?php 

namespace App\Helpers;

class Helper
{
   
    public static function csvToArray($filename = '', $delimiter = ',')
    {
        if(!file_exists($filename) || !is_readable($filename))
		    return FALSE;
	
        $header = NULL;
        $data = array();
        
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
        
            fclose($handle);
        }

        return $data;
    }

    public static function collectionToCsv($collection, $fileName)
    {
        $columns = array_keys($collection->first());
        $headers = array(
            'Content-Type' => 'text/csv',
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        
        $callback = function() use ($fileName, $collection, $columns) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $columns);

            foreach ($collection as $item) {
                fputcsv($handle, $item);
            }

            fclose($handle);
        };

        
        

        return \Illuminate\Support\Facades\Response::stream($callback, 200, $headers);
    }

}
<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;
use Storage;

class PhotoHelper {
    public static function pythonProcess($imagePath, $id) {
        // Increase the maximum execution time for this function
        set_time_limit(300); // Set to 5 minutes

        $imageurl = url($imagePath);

        $comando = "docker run --rm image2recognition \"$imageurl\" $id crear";

        $proceso = Process::run($comando);


        // Log the command for debugging
        Log::info('Executing command: ' . $comando);

        // Log the output for debugging
        Log::info('Command output: ' . $proceso->output());

        // Verify if the process completed successfully
        if (trim($proceso->output()) === 'True') {
            return true;
        } else {
            return false;
        }
    }
}

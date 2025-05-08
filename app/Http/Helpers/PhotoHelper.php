<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Log;
use Storage;

class PhotoHelper {
    public static function pythonProccess($imagePath, $id) {
        // Increase the maximum execution time for this function
        set_time_limit(300); // Set to 5 minutes

        // Normalize paths and commands based on the operating system
        $scriptPath = str_replace('\\', '/', storage_path('app/private/image2recognition2dot0/src/main.py'));
        $venvActivate = str_replace('\\', '/', storage_path('app/private/image2recognition2dot0/venv/Scripts/activate.bat'));

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows command
            $comando = $venvActivate . " & python " . $scriptPath . " " . escapeshellarg($imagePath) . " " . $id . " crear";
        } else {
            // Unix-based command
            $venvActivate = str_replace('\\', '/', storage_path('app/private/image2recognition2dot0/venv/bin/activate'));
            $comando = "source " . $venvActivate . " && python3 " . $scriptPath . " " . escapeshellarg($imagePath) . " " . escapeshellarg($id) . " " . escapeshellarg('crear');
        }

        // Log the command for debugging
        Log::info('Executing command: ' . $comando);

        $output = shell_exec($comando);

        // Log the output for debugging
        Log::info('Command output: ' . $output);

        // Verify if the process completed successfully
        if (trim($output) === 'True') {
            return true;
        } else {
            return false;
        }
    }
}

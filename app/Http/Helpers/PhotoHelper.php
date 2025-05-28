<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;
use Storage;
use Exception;

class PhotoHelper {
    public static function pythonProcess($imagePath, $id) {
        set_time_limit(300); // 5 mins para timeout

        $imageurl = url($imagePath);

        // Asegurarse que los logs se guarden en el directorio correcto
        $logDirectory = storage_path('logs');
        if (!is_dir($logDirectory)) {
            mkdir($logDirectory, 0755, true);
        }

        $logFile = storage_path('logs/docker_output.log');
        $comando = "docker run --rm --add-host=host.docker.internal:host-gateway image2recognition \"$imageurl\" $id crear >> $logFile 2>&1 &";

        // Log the command for debugging
        Log::info('Executing command asynchronously: ' . $comando);

        try {
            // Execute the command asynchronously
            exec($comando, $output, $exitCode);

            if ($exitCode === 0) {
                Log::info('Command started successfully.');
                return true;
            } else {
                Log::error('Failed to start command with exit code: ' . $exitCode);
                return false;
            }
        } catch (Exception $e) {
            // Log any exceptions that occur
            Log::error('Error starting command: ' . $e->getMessage());
            return false;
        }
    }
}

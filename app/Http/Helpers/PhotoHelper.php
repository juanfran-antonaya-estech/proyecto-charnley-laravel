<?php

namespace App\Http\Helpers;


class PhotoHelper {
    public static function pythonProccess($imagePath, $id) {
        $args = [
            'imagePath' => $imagePath,
            'id' => $id,
            'mode' => 'create',
        ];
        // $command = "python3 /path/to/your/script.py " . escapeshellarg($imagePath);
        // $output = shell_exec($command);
        return true;
    }
}

<?php

namespace App\Services;

use Exception;

class GeneticsService {
    /**
     * @throws Exception
     */
    public function modifyAndCalculateCRC32($filename, $modifications) {
        if (count($modifications) > 64) {
            throw new Exception("Número máximo de adiciones excedido (máximo permitido es 64).");
        }

        $fileContent = file_exists($filename) ? file_get_contents($filename) : '';
        $output = [];

        foreach ($modifications as $index => $modification) {
            list($position, $byte) = explode(' ', $modification);
            $position = (int) $position;
            $byte = (int) $byte;

            if ($byte < 0 || $byte > 255) {
                throw new Exception("El valor del byte está fuera del rango permitido (0-255).");
            }

            if ($position < 0 || $position > strlen($fileContent)) {
                throw new Exception("La posición está fuera del rango permitido.");
            }

            $fileContent = $this->insertByte($fileContent, $byte, $position);
            $crc32 = hash('crc32b', $fileContent);
            $output[] = "{$filename} " . ($index + 1) . ": " . strtoupper(dechex(hexdec($crc32)));
        }

        return $output;
    }

    private function insertByte($content, $byte, $position) {
        $byte = chr($byte);
        return substr_replace($content, $byte, $position, 0);
    }
}

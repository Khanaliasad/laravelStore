<?php

use Illuminate\Support\Facades\Storage;


class Helper
{
    public static function csvToArray($filename)
    {
        if (!file_exists($filename)) {
            return [];
        }

        $data = array();
        // Open file to read
        $file = fopen($filename, 'r');
        $i = 0;

        while (($buffer = fgetcsv($file, 4096)) !== false) {
            $i++;

            // Set headers if first row
            if (1 == $i) {
                $headers = $buffer;
                continue;
            }

            $j = 0;
            // Set column data
            foreach ($headers as $col) {
                $data[$i][$col] = isset($buffer[$j]) ? $buffer[$j] : null;
                $j++;
            }
        }

        fclose($file);

        // Remove empty rows
        foreach ($data as $key => $row) {
            if (!array_key_exists($headers[0], $row)) {
                unset($data[$key]);
            }
        }

        return $data;
    }

    public static function storageCsvToArray($fileName)
    {
        $separatorChar = ',';
        $enclosureChar = '"';
        $newlineChar = "\n";

        $string = Storage::disk('local')->get("csv/$fileName");
        //$string = file_get_contents($csv);
        $array = $headers = array();
        $size = strlen($string);
        $columnIndex = 0;
        $rowIndex = 0;
        $fieldValue = "";
        $isEnclosured = false;
        for ($i = 0; $i < $size; $i++) {

            $char = $string[$i];
            $addChar = "";

            if ($isEnclosured) {
                if ($char == $enclosureChar) {

                    if ($i + 1 < $size && $string[$i + 1] == $enclosureChar) {
                        // escaped char
                        $addChar = $char;
                        $i++; // dont check next char
                    } else {
                        $isEnclosured = false;
                    }
                } else {
                    $addChar = $char;
                }
            } else {
                if ($char == $enclosureChar) {
                    $isEnclosured = true;
                } else {

                    if ($char == $separatorChar) {
                        if ($rowIndex == 0) {
                            $headers[$columnIndex] = trim($fieldValue);
                        } else {
                            $array[$rowIndex][$headers[$columnIndex]] = trim($fieldValue);
                        }
                        $fieldValue = "";

                        $columnIndex++;
                    } elseif ($char == $newlineChar) {
                        echo $char;
                        if ($rowIndex == 0) {
                            $headers[$columnIndex] = trim($fieldValue);
                        } else {
                            $array[$rowIndex][$headers[$columnIndex]] = trim($fieldValue);
                        }
                        $fieldValue = "";
                        $columnIndex = 0;
                        $rowIndex++;
                    } else {
                        $addChar = $char;
                    }
                }
            }
            if ($addChar != "") {
                $fieldValue .= $addChar;

            }
        }

        if ($fieldValue) { // save last field
            $array[$rowIndex][$columnIndex] = $fieldValue;
        }
        return $array;
    }

    public static function ArrayToCsv($productArray)
    {
        // Open a file for writing
        $csvFile = fopen('productsDemo3-' . time() . '.csv', 'w');

        // Write the header row
        $headerRow = array_keys($productArray);
        $headerRowWithoutVariant = array_diff($headerRow, ['new_variant']);

        // Add variant columns to the header
        foreach ($productArray['new_variant'] as $variant) {
            foreach ($variant as $key => $value) {
                $headerRowWithoutVariant[] = 'new_variant-' . $key;
            }
        }

        // Remove duplicate columns
        $headerRowWithoutVariant = array_unique($headerRowWithoutVariant);

        fputcsv($csvFile, $headerRowWithoutVariant);

        // Write the data rows
        foreach ($productArray['new_variant'] as $variant) {
            $flattenedProduct = $productArray;
            unset($flattenedProduct['new_variant']); // Remove 'new_variant' from the data

            // Merge variant data into the flattened product
            $flattenedProduct = array_merge($flattenedProduct, $variant);

            fputcsv($csvFile, $flattenedProduct);
        }

        // Close the file
        fclose($csvFile);

        echo 'CSV file created successfully: products3.csv';
    }
    public static function getBaseUrl() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $script = $_SERVER['SCRIPT_NAME'];

        // Remove script filename from the end of the path
        $path = trim(dirname($script), '/');

        return "$protocol://$host/$path";
    }

}

function convertTimeStampTodate($str)
{
    return date("F j, Y, g:i a", strtotime($str));
}


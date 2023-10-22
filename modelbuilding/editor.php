<?php
// Prompt the user for the external file name
$filename = readline("Enter the name of the external file: ");

// Check if the file exists
if (file_exists($filename)) {
    // Read the content of the external file into a string
    $content = file_get_contents($filename);

    // Use a regular expression to find and replace the strings
    $pattern = '/\*\*(.*?)\*\*/'; // Matches any string surrounded by '**'
    $replacement = '#### $1'; // Replaces with '#### ' followed by the matched string
    $content = preg_replace($pattern, $replacement, $content);

    // Write the modified content back to the same file
    file_put_contents($filename, $content);

    echo "Replacement done successfully in $filename!\n";
} else {
    echo "The file '$filename' does not exist.\n";
}
?>
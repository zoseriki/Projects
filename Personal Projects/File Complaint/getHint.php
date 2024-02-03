<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// Fill up array with issue types
$issueTypes = [
    "Overloading", "Broken Authentication", "Security Access Issue", "Error Messages",
    // Add more issue types as needed
];

// Get the q parameter from URL
$q = $_GET["issueType"];

// Lookup all hints from the array if the length of q is greater than 0
if (strlen($q) > 0) {
    $hint = "";
    foreach ($issueTypes as $issueType) {
        if (strtolower($q) == strtolower(substr($issueType, 0, strlen($q)))) {
            if ($hint === "") {
                $hint = $issueType;
            } else {
                $hint .= " , " . $issueType;
            }
        }
    }
}

// Set output to "no suggestion" if no hint was found or to the correct values
$response = ($hint == "") ? "no suggestion" : $hint;

// Output the response
echo $response;
?>
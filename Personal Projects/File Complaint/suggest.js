"use strict";

window.onload = pageLoad;

function pageLoad() {
    document.getElementById("issueType").onkeyup = showHint;
}

// Javascript function that takes a string that the user is entering
// in the issue reporting page and makes an asynchronous request to
// getHint.php to find matching substrings.
// Uses Prototype's Ajax model
function showHint() {
    var inputString = document.getElementById("issueType").value;
    if (inputString.length == 0) {
        $("suggestedIssueTypes").innerHTML = "";
        return;
    }

    new Ajax.Request(
        "getHint.php", {
            method: "get",
            parameters: {
                issueType: inputString
            },
            onSuccess: ajaxSuccess,
            onFailure: ajaxFailure
        }
    );
}

// Function to execute when the Ajax request is successful
function ajaxSuccess(ajax) {
    $("suggestedIssueTypes").innerHTML = ajax.responseText;
}

// Function to execute when the Ajax request is unsuccessful
function ajaxFailure() {
    alert("Ajax request failed");
}
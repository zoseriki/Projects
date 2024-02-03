"use strict";

 

// when window loads this function will be implemented

window.onload = pageLoad;

function pageLoad() {

    // assigns the validateLoginForm function to the onsubmit event so it will be executed when the form is submitted

    document.querySelector("form").onsubmit = validateLoginForm;

}

 

function validateLoginForm() {

    var username = document.getElementById("username").value;

    var password = document.getElementById("password").value;

 

    // if both username and password are empty then alert user

    if (username === "" && password === "") {

        alert("You did not enter both username and password. Please ensure both fields are filled out.");

        document.getElementById("username").focus();

        return false;

    }

 

    // if username is empty, alert user and move cursor to username field

    else if (username === "") {

        alert("You did not enter a username. Please ensure both fields are filled out.");

        document.getElementById("username").focus();

        return false;

    }

 

    // if password is empty, alert user and move cursor to password field

    else if (password === "") {

       alert("You did not enter a password. Please ensure both fields are filled out.");

        document.getElementById("password").focus();

        return false;

    }

 

    // other validation or processing logic can be added here

 

    // if everything is filled out, the form will be submitted

    return true;

}

 
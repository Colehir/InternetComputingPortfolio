'use strict';
//calculate miles to kilometers
var Mi_to_Km = function (m) {
    return (m*1.609);
};

//calculate kilometers to miles
var Km_to_Mi = function (k) {
    return (k/1.609);
};

//print if input is not a number
function nanError() {
    document.getElementById("result").innerHTML = "You did not enter a number.";
};

//print if input is correct
var report = function (kilo, miles) {
    document.getElementById("result").innerHTML = parseFloat(kilo,10).toFixed(2) + " KM = " + parseFloat(miles,10).toFixed(2) + " MI";
};

//event handler for when miles to kilometers is clicked
document.getElementById("Mi_to_Km").onclick = function () {
    var m = document.getElementById("distance").value;
    if (!isNaN(m)) //check if input is a number
        report(Mi_to_Km(m), m);
    else
        nanError();
};

//event handler for when miles to kilometers is clicked
document.getElementById("Km_to_Mi").onclick = function () {
    var k = document.getElementById("distance").value;
    if (!isNaN(k)) //check if input is a number
        report(k, Km_to_Mi(k));
    else
        nanError();
};

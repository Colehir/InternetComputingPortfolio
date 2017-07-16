var s;
function showHint(str) {
    console.log(s);
    if (s === str) { 
        return;
    } 
    else if(str.length == 0)
        {
            document.getElementById("namehint").innerHTML = "";
            return;
        }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("namehint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
        s = str;
    }
}
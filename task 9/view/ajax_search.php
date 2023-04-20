<div class="mb-3">
    <label for="search" class="form-label">Search</label>
    <input type="text" onkeyup="search(this.value)" name="search" class="form-control" id="search">
    <br>
    <div class="" id="search_result"></div>
</div>
<script>
    function search(str) {
        /*
        if (str == "") {
            document.getElementById("search_result").innerHTML = "";
            return;
        }
        */
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("search_result").innerHTML=this.responseText;
            }
        }

        xhr.open("GET", "../control/ajax_search_control.php?q=" + str, true);
        xhr.send();
    }
</script>
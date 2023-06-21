function accepter(type,id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("dataTable").innerHTML = this.responseText;
      }
    };
    console.log("kkkk");

    xmlhttp.open("GET","http://localhost/projetWEB/AJAX/RH/RHverfiyAccepter.php?type="+type+"&id="+id,true);      
    xmlhttp.send();
  }

  function refuser(type,id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("dataTable").innerHTML = this.responseText;
      }
    };
    console.log("kkkk");

    xmlhttp.open("GET","http://localhost/projetWEB/AJAX/RH/RHverfiyRefuser.php?type="+type+"&id="+id,true);      
    xmlhttp.send();
  }


function showReclamation(str) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("dataTable").innerHTML = this.responseText;
      }
    };
    var btn_ajouter_abs= document.getElementById("btn_ajouter_abs").innerHTML ="";
    var btn_abs= document.getElementById("btn_abs")
    if ( btn_abs !== null) {
      btn_abs.innerHTML ="";
    }
    
    
    xmlhttp.open("GET","http://localhost/projetWEB/AJAX/RH/RHverfiyAjax.php?type="+str,true);      
    xmlhttp.send();
  }

  function showAbsence(str) {
    var xmlhttp = new XMLHttpRequest();
      var absNJ=document.getElementById("absNJ");
      var absNJ=document.getElementById("absNJ");
      var absNJ=document.getElementById("absNJ");
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contentAbsence").innerHTML = this.responseText;
      }
    };
    var btn_ajouter_abs= document.getElementById("btn_ajouter_abs").innerHTML =`
    <button data-toggle="modal" data-target="#ajouterAbs" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fa fa-plus fa-sm text-white-50"></i> Ajouter un employe</button>`;




    xmlhttp.open("GET","http://localhost/projetWEB/AJAX/RH/RHverfiyAjax.php?type="+str,true);      
    xmlhttp.send();
  }





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


  function ajouterAbs() {

    var dateAbs=document.querySelector("#dateAbs").value;
    var employeAbs=document.querySelector("#employeAbs").value;
    var nbHeure=document.querySelector("#nbHeure").value;


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contentAbsence").innerHTML = this.responseText;
      }
    };
    var btn_ajouter_abs= document.getElementById("btn_ajouter_abs").innerHTML =`
    <button data-toggle="modal" data-target="#ajouterAbs" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fa fa-plus fa-sm text-white-50"></i> Ajouter un employe</button>`;

    xmlhttp.open("GET","http://localhost/projetWEB/include/ajouterAbs.php?dateAbs="+dateAbs+"&employeAbs="+employeAbs+"&nbHeure="+nbHeure,true);      
    xmlhttp.send();
    
  }
      const elements_1 = document.querySelector("#btn_verify_1");
      const elements_2 = document.querySelector("#btn_verify_2");
      const elements_3 = document.querySelector("#btn_verify_3");
      const elements_4 = document.querySelector("#btn_verify_4");
      
      elements_1.addEventListener("click", function() {
          // Remove "active" class from all elements
            elements_2.classList.remove("active");
            elements_3.classList.remove("active");
            elements_4.classList.remove("active");
            elements_1.classList.add("active");
        });



        elements_2.addEventListener("click", function() {
          // Remove "active" class from all elements
            elements_1.classList.remove("active");
            elements_3.classList.remove("active");
            elements_4.classList.remove("active");

          elements_2.classList.add("active");
        });

        elements_3.addEventListener("click", function() {
          // Remove "active" class from all elements
            elements_1.classList.remove("active");
            elements_2.classList.remove("active");
            elements_4.classList.remove("active");

          elements_3.classList.add("active");
        });

        elements_4.addEventListener("click", function() {
          // Remove "active" class from all elements
            elements_1.classList.remove("active");
            elements_2.classList.remove("active");
            elements_3.classList.remove("active");

          elements_4.classList.add("active");
        });
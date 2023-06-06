function showReclamation(str) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("dataTable").innerHTML = this.responseText;
      }
    };

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



      const elements_1 = document.querySelector("#btn_verify_1");
      const elements_2 = document.querySelector("#btn_verify_2");
      const elements_3 = document.querySelector("#btn_verify_3");
      const elements_4 = document.querySelector("#btn_verify_4");
      console.log("jjj");

      console.log(elements_1);
      elements_1.addEventListener("click", function() {
          // Remove "active" class from all elements
            elements_2.classList.remove("active");
            elements_3.classList.remove("active");

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


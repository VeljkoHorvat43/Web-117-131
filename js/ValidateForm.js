function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "functions/check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
  if(data!="<span class='status-available'> Username je slobodan.</span>"){
    isValid=false;
  //console.log(isValid);
}
else{
  isValid=true;
  //  console.log(isValid);
}
$("#e_user").html(data);
$("#loaderIcon").hide();
},
error:function (){
  console.log('error');
}
});
}
function checkAvailabilityEmail() {
$("#loaderIcon2").show();
jQuery.ajax({
url: "functions/check_availability.php",
data:'email='+$("#mail").val(),
type: "POST",
success:function(data){
  if(data!="<span class='status-available'> E-Mail se moze koristiti.</span>"){
    isValid=false;
  //console.log(isValid);
}
else{
  isValid=true;
  //  console.log(isValid);
}
$("#e_mail").html(data);
$("#loaderIcon2").hide();
// https://www.w3resource.com/javascript/form/email-validation.php

},
error:function (){
  console.log('error');
}
});
}


window.addEventListener('load', function() {
    document.getElementById('register').addEventListener('submit', function(e) {
        e.preventDefault();
        if (checkform()) this.submit();
    });

});



var checkform = function() {
    document.getElementById('e_name').innerHTML = "";
    document.getElementById('e_lname').innerHTML = "";
    document.getElementById('e_user').innerHTML = "";
    document.getElementById('e_pass').innerHTML = "";
    document.getElementById('e_rp').innerHTML = "";
    document.getElementById('e_mail').innerHTML = "";
    document.getElementById('e_ddl').innerHTML = "";
    document.getElementById('e_phone').innerHTML = "";
    document.getElementById('e_address').innerHTML = "";

    var isValid = true;

    if (document.getElementById('firstName').value === "") {
        document.getElementById('e_name').innerHTML = "Ime je obavezno!";
        isValid = false;
    }

    if (document.getElementById('lastName').value === "") {
        document.getElementById('e_lname').innerHTML = "Prezime je obavezno!";
        isValid = false;
    }

    if (document.getElementById('username').value === "") {
        document.getElementById('e_user').innerHTML = "Korisničko ime je obavezno!";
        isValid = false;
    }

    if (document.getElementById('pass').value === "") {
        document.getElementById('e_pass').innerHTML = "Šifra je obavezna!";
        isValid = false;
    }

    if (document.getElementById('pass').value !== "" && document.getElementById('pass').value.length < 8){
        document.getElementById('e_pass').innerHTML = "Minimalan broj karaktera je 8!";
        isValid = false;
    }

    if (document.getElementById('repeatp').value !== document.getElementById('pass').value) {
        document.getElementById('e_rp').innerHTML = "Šifre se ne podudaraju!";
        isValid = false;
    }

    var rex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!rex.test(document.getElementById('mail').value)) {
        document.getElementById('e_mail').innerHTML = "Neispravan format!";
        isValid = false;
    }
    if (document.getElementById('mail').isEmpty) {
        document.getElementById('e_mail').innerHTML = "E-mail je obavezan!";
        isValid = false;
    }

    var txt = document.getElementById('city').options[document.getElementById('city').selectedIndex].text;
    if (txt === "Izaberite mesto"){
        document.getElementById('e_ddl').innerHTML = "Mesto je obavezno!";
        isValid = false;
    }
//   var inputtxt = document.getElementById('phone').text;
//     function phonenumber(inputtxt)
// {
//   var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
//   if(inputtxt.value.match(phoneno))
//         {
//           isValid=true;
//         }
//       else
//         {
//         document.getElementById('e_pho').innerHTML = "Telefon je obavezan!";
//         isValid = false;
//         }
// }
// if (document.getElementById('phone').value === "") {
//     document.getElementById('e_pho').innerHTML = "Telefon je obavezan!";
//     isValid = false;
// }
// if (document.getElementById('adress').value === "") {
//     document.getElementById('e_addr').innerHTML = "Adresa je obavezna!";
//     isValid = false;
// }

    if (isValid){
        // const forma = new FormData(register);
        //       console.log(forma);
        // fetch('insert-user.php',{
        //     method:"post", body: forma
        // })
        //     .then(response => response.json())
        //     .then((data) =>{
        //         if(data.status == "0"){
        //             location.replace('activation.php');
        //         }
        //     });
            return true;
    }

return false;
}

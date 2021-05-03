window.addEventListener('load', function() {
    document.getElementById('register').addEventListener('submit', function(e) {
        e.preventDefault();
        if (checkForm()) this.submit();
    });
})

var checkForm = function (){
    var fName,lName,user,pw,rpw,email,selected,txt1,txt2,txt3,txt4,txt5,txt6,txt7,txt8;
    var isValid,isValid1,isValid2,isValid3,isValid4,isValid5,isValid6,isValid7,isValid8;
    fName=document.getElementById("firstName").value;
    if (fName===""){
        txt1="Ime je obavezno!";
        isValid1 = false;
    }
    else {
        txt1="";
        isValid1 = true;
    }
    document.getElementById("e_name").innerHTML=txt1;

    lName=document.getElementById("lastName").value;
    if (lName===""){
        txt2="Prezime je obavezno!";
        isValid2 = false;
    }
    else {
        txt2="";
        isValid2 = true;
    }
    document.getElementById("e_lname").innerHTML=txt2;

    user=document.getElementById("username").value;
    if (user===""){
        txt3="Korisničko ime je obavezno!";
        isValid3 = false;
    }
    else {
        txt3="";
        isValid3 = true;
    }
    document.getElementById("e_user").innerHTML=txt3;

    pw=document.getElementById("pass").value;
    if (pw===""){
        txt4="Šifra je obavezna!";
        isValid4 = false;
    }
    else {
        txt4="";
        isValid4 = true;
    }
    document.getElementById("e_pass").innerHTML=txt4;

    rpw=document.getElementById("repeatp").value;
    if(rpw!==pw){
        txt5="Šifre se ne podudaraju!";
        isValid5=false;
    }
    else{
        txt5="";
        isValid5 = true;
    }
    document.getElementById("e_rp").innerHTML=txt5;

    email=document.getElementById("mail").value;
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!re.test(email.value)) {
        txt6="Neispravna e-mail adresa!";
        isValid6 = false;
    }
    else{
        txt6="";
        isValid6 = true;
    }
    document.getElementById("e_mail").innerHTML=txt6;

    if(email===""){
        txt7="E-mail adresa je obavezna!"
        isValid7 = false;
    }
    else{
        txt7="";
        isValid7 = true;
    }
    document.getElementById("e_mail").innerHTML=txt7;

    ddl=document.getElementById("city");
    selectedText=ddl.options[ddl.selectedIndex].value;
    if(selectedText===0){
        txt8="Mesto je obavezno!"
        isValid8 = false;
    }
    else{
        txt8="";
        isValid8 = true;
    }
    document.getElementById("e_ddl").innerHTML=txt8;

    isValid=isValid1 && isValid2 && isValid3 && isValid4 && isValid5 && isValid6 && isValid7 && isValid8;
    return isValid;

    console.log(isValid.getValue());
}

$(document).ready(function() {

    var state = false;

    //$("input:text:visible:first").focus();

    $('#accesspanel').on('submit', function(e) {

        //e.preventDefault();
            document.getElementById("litheader").className = "poweron";
            document.getElementById("go").className = "";
            document.getElementById("go").value = "Initializing...";
});

});

function getBase64Image(img) {
    var canvas = document.createElement("canvas");
    canvas.width = img.width;
    canvas.height = img.height;

    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);

    var dataURL = canvas.toDataURL("image/png");

    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
//
function store(){

    var fname = document.getElementById('fname');
    var email = document.getElementById('email');
    var city = document.getElementById('city');
    var password = document.getElementById('password');

    if(email.value.length == 0 || password.value.length == 0 || city.value.length == 0 || fname.value.length == 0 ){
      document.getElementById("litheader").className = "";
      document.getElementById("go").className = "denied";
      document.getElementById("go").value = "Please fill in all the fields";
    } else{



        localStorage.setItem('fname', fname.value);
        localStorage.setItem('email', email.value);
        localStorage.setItem('city',city.value);
        localStorage.setItem('password', password.value);
        //fetch image
        var bannerImage = document.getElementById('bannerImg');
        var result = document.getElementById('res');
        var img = document.getElementById('tableBanner');
        bannerImage.addEventListener('change', function() {
            var file = this.files[0];
            // Basic type checking.
            if (file.type.indexOf('image') < 0) {
                res.innerHTML = 'invalid type';
                return;
            }

            // Create a file reader
            var fReader = new FileReader();

            // Add complete behavior
            fReader.onload = function() {
                // Show the uploaded image to banner.
                img.src = fReader.result;

                // Save it when data complete.
                // Use your function will ensure the format is png.
                localStorage.setItem("photo", getBase64Image(img));
                // You can just use as its already a string.
                // localStorage.setItem("imgData", fReader.result);
            };

            // Read the file to DataURL format.
            fReader.readAsDataURL(file);
        });

        alert('Your account has been created');
        window.open("login.html");
    }
}

//checking
function check(){


    //login form fields
    var email = document.getElementById('email');
    var password = document.getElementById('password');

    if(email.value.length == 0){
      document.getElementById("go").value = "Please fill in email";

    }else if(password.value.length == 0){
        alert('Please fill in password');

    } else {
      var storedMail = localStorage.getItem('email');
      var storedPw = localStorage.getItem('password');
    //  var userRemember = document.getElementById("rememberMe");

      if(email.value == storedMail && password.value == storedPw){
        document.getElementById("litheader").className = "poweron";
        document.getElementById("go").className = "";
        document.getElementById("go").value = "Success";
        alert('You are logged in.');
        window.close("login.html");
        window.open("index.html");
      }else{
        document.getElementById("litheader").className = "";
        document.getElementById("go").className = "denied";
        document.getElementById("go").value = "Invalid Credentials";
        alert('Invalid Credentials');
      }
    }

}

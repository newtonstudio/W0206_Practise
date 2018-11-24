<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?=base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/css/clean-blog.min.css')?>" rel="stylesheet">

    <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyA4XvxLGyOv6eENbqDKdUmTYyekpG8qZfE",
    authDomain: "w0206-2.firebaseapp.com",
    databaseURL: "https://w0206-2.firebaseio.com",
    projectId: "w0206-2",
    storageBucket: "w0206-2.appspot.com",
    messagingSenderId: "902855485543"
  };
  firebase.initializeApp(config);
</script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="<?=base_url()?>">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('about')?>">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('report')?>">Report</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('contact')?>">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:fbLogin();">Facebook Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:googleLogin();">Google Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <script>

      function googleLogin(){

        var provider = new firebase.auth.GoogleAuthProvider();
        
        provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
        firebase.auth().useDeviceLanguage();

        firebase.auth().signInWithPopup(provider).then(function(result) {
          // This gives you a Google Access Token. You can use it to access the Google API.
          var token = result.credential.accessToken;
          // The signed-in user info.
          var user = result.user;

          console.log(result);
          $.ajax({
            "url":"http://localhost/w0206_Practise/Jason/api/glogin",
            "data":{"token":result.credential.idToken},
            "method":"POST"
          }).done(function(res){
            console.log(res);
          })
          
          // ...
        }).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          // The email of the user's account used.
          var email = error.email;
          // The firebase.auth.AuthCredential type that was used.
          var credential = error.credential;
          // ...
          console.log(error);
        });

      }

      function fbLogin(){

        var provider = new firebase.auth.FacebookAuthProvider();
        firebase.auth().useDeviceLanguage();
        firebase.auth().signInWithPopup(provider).then(function(result) {
          // This gives you a Facebook Access Token. You can use it to access the Facebook API.
          var token = result.credential.accessToken;
          // The signed-in user info.
          var user = result.user;

          console.log(result);

          $.ajax({
            "url":"http://localhost/w0206_Practise/Jason/api/flogin",
            "data":{"token":result.credential.accessToken},
            "method":"POST"
          }).done(function(res){
            console.log(res);
          })

          // ...
        }).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          // The email of the user's account used.
          var email = error.email;
          // The firebase.auth.AuthCredential type that was used.
          var credential = error.credential;
          // ...
          console.log(error);
        });

      }
    </script>
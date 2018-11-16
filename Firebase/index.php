<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>


        <a href="javascript:googleLogin();">Google Login</a>

        <a href="javascript:facebookLogin();">Facebook Login</a>

    <script src="https://www.gstatic.com/firebasejs/5.5.8/firebase.js"></script>
    <script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyCaj6fj04TNuypk8FITGkkmegKO-MTkQOA",
        authDomain: "w0206-cbcdc.firebaseapp.com",
        databaseURL: "https://w0206-cbcdc.firebaseio.com",
        projectId: "w0206-cbcdc",
        storageBucket: "",
        messagingSenderId: "896812707953"
    };
    firebase.initializeApp(config);

    function googleLogin(){

        var provider = new firebase.auth.GoogleAuthProvider();
        provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
        firebase.auth().useDeviceLanguage();

        firebase.auth().signInWithPopup(provider).then(function(result) {

            
        // This gives you a Google Access Token. You can use it to access the Google API.
        var token = result.credential.idToken;
        // The signed-in user info.
        var user = result.user;
        // ...
        console.log(token);

        }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        // ...
        });

    }        

    function facebookLogin(){

        var provider = new firebase.auth.FacebookAuthProvider();        
        firebase.auth().useDeviceLanguage();

        firebase.auth().signInWithPopup(provider).then(function(result) {
            // This gives you a Facebook Access Token. You can use it to access the Facebook API.
            var token = result.credential.accessToken;
            // The signed-in user info.
            var user = result.user;
            console.log(result);
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
            });



    }

    </script>
    </body>
</html>
// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDeCn0PoRZnjOhnZE5KpP626NLM1-biiPU",
  authDomain: "project-b3568.firebaseapp.com",
  projectId: "project-b3568",
  storageBucket: "project-b3568.appspot.com",
  messagingSenderId: "40476047310",
  appId: "1:40476047310:web:0cc776c35f6d6b8f745d9f",
  measurementId: "G-KTLMTQSPGR"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);


import { getAuth } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-auth.js";
import { createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-auth.js";

const auth = getAuth();
createUserWithEmailAndPassword(auth, email, password)
  .then((userCredential) => {
    // Signed in 
    const user = userCredential.user;
    // ...
  })
  .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
    // ..
  });


$(document).ready(function(){
    $('#signUpButton').click(function(){
        var topPassword = $('#topPasswordBox').val();
        var bottomPassword = $('#bottomPasswordBox').val();
        var newUsername = $('#newUsername').val();
        $('.passwordBox').css("border-color", "black");
        $('#errorMessageTop').css("color", "black");
        $('#errorMessageBottom').css("color", "black");
        var goodPassword = true;
        
        if(topPassword.length<7 || bottomPassword.length<7){
            $('.passwordBox').css("border-color", "red");
            $('#errorMessageTop').css("color", "red");
            goodPassword = false;
        }
        if(topPassword != bottomPassword){
            $('.passwordBox').css("border-color", "red");
            $('#errorMessageBottom').css("color", "red");
            goodPassword = false;
        }
        
        //ONCE THE PASSWORD HAS BEEN VERIFIED TO BE GOOD
        if(goodPassword){
            console.log(newUsername)
            console.log(bottomPassword)
        }
    });
});

(function( window ){
    'use strict';

    var body = document.body,
        mask = document.createElement("div"),
        slideButton = document.querySelector( ".slide_button"),
        pushSlideLeft = document.querySelector( ".push_slide_left"),
        userLogin = document.querySelector(".user_login"),
        btnCancel = document.querySelector(".btn_cancel"),
        userRegistration = document.querySelector(".registration_login"),
        btnCancelRegistration = document.querySelector(".btn_cancel_registration"),
        divTopBottom = document.querySelector("#cf"),
        activeNav = "",
        activeLogin = "";
    mask.className = "mask";

    slideButton.addEventListener( "click", function(){
        if(activeNav==""){
            classie.add( body, "sml-open" );
            activeNav = "sml-open";
        }
        else{
            classie.remove( body, activeNav );
            activeNav = "";
        }
    } );

    userLogin.addEventListener( "click", function(){
        classie.add( body, "login-open" );
    } );

    userRegistration.addEventListener( "click", function(){
        classie.add( body, "registration-open" );
    } );

    btnCancel.addEventListener( "click", function(){
        classie.remove( body, "login-open" );
    } );

    btnCancelRegistration.addEventListener( "click", function(){
        classie.remove( body, "registration-open" );
    } );

    mask.addEventListener( "click", function(){
        classie.remove( body, activeNav );
        activeNav = "";
    } );

    divTopBottom.addEventListener( "click", function(){
        classie.add( body, "hover_image" );
    } );

})( window );
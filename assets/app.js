import './styles/app.css'
import './styles/onglets.css'

var $ = require('jquery');

$(document).ready(function(){

    $(".span-donnees").click(function(){

        $(this).css("background-color", "whitesmoke");
        $(this).css("border", "solid whitesmoke");

        $(".span-mensurations").css('background-color' , 'lightgray');
        $(".span-mensurations").css('border' , 'lightgray');

        $(".span-langues").css('background-color' , 'lightgray');
        $(".span-langues").css('border' , 'lightgray');

        $(".span-photos").css('background-color' , 'lightgray');
        $(".span-photos").css('border' , 'lightgray');

        $('.donnees-personnels').css('display', 'block');
        $('.mensurations').css('display', 'none');
        $('.langues-commentaires').css('display', 'none');
        $('.photos-modele').css('display', 'none');

    });

    $(".span-mensurations").click(function(){

        $(this).css("background-color", "whitesmoke");
        $(this).css("border", "solid whitesmoke");

        $(".span-donnees").css('background-color' , 'lightgray');
        $(".span-donnees").css('border' , 'lightgray');

        $(".span-langues").css('background-color' , 'lightgray');
        $(".span-langues").css('border' , 'lightgray');

        $(".span-photos").css('background-color' , 'lightgray');
        $(".span-photos").css('border' , 'lightgray');

        $('.donnees-personnels').css('display', 'none');
        $('.mensurations').css('display', 'block');
        $('.langues-commentaires').css('display', 'none');
        $('.photos-modele').css('display', 'none');

        
    });

    $(".span-langues").click(function(){

        $(this).css("background-color", "whitesmoke");
        $(this).css("border", "solid whitesmoke");

        $(".span-donnees").css('background-color' , 'lightgray');
        $(".span-donnees").css('border' , 'lightgray');

        $(".span-mensurations").css('background-color' , 'lightgray');
        $(".span-mensurations").css('border' , 'lightgray');

        $(".span-photos").css('background-color' , 'lightgray');
        $(".span-photos").css('border' , 'lightgray');

        $('.donnees-personnels').css('display', 'none');
        $('.mensurations').css('display', 'none');
        $('.langues-commentaires').css('display', 'block');
        $('.photos-modele').css('display', 'none');

    });

    $(".span-photos").click(function(){

        $(this).css("background-color", "whitesmoke");
        $(this).css("border", "solid whitesmoke");

        $(".span-donnees").css('background-color' , 'lightgray');
        $(".span-donnees").css('border' , 'lightgray');

        $(".span-mensurations").css('background-color' , 'lightgray');
        $(".span-mensurations").css('border' , 'lightgray');

        $(".span-langues").css('background-color' , 'lightgray');
        $(".span-langues").css('border' , 'lightgray');

        $('.donnees-personnels').css('display', 'none');
        $('.mensurations').css('display', 'none');
        $('.langues-commentaires').css('display', 'none');
        $('.photos-modele').css('display', 'block');

        
    });

    








});
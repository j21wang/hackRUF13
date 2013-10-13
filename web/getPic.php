<!doctype html>
<html>
     <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://www.rdio.com/api/api.js?client_id=t_oGZ_-05KslYrSGzCwnsQ"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="../foundation/js/foundation.min.js"></script>
        <script src="rdio-utils.js"></script>
        <link rel="stylesheet" type="text/css" href="getPic.css"/>
<link href='http://fonts.googleapis.com/css?family=Averia+Gruesa+Libre' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <center>
        <h1> Food for Thought. </h1>
        <div id="container">
        <div id="imgDiv">
        </div>
        </div>
        </center>
     <script>
        $(document).ready(function(){

            var food  = '<?php session_start(); echo $_SESSION['foodName'];?>';
            var fullfood = '<?php session_start() ; echo $_SESSION['full'];?>'; 

        function getUrlVars() {
            var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
            });
            return vars;
        }

        var isPlay = false;
        var numSong = 0;
        var resp = [];

        R.ready(function(){
            numSong++;
            var input=food;
            console.log(input);
            R.request({
                method:"search",
                content:{
                    query:input,
                    types:"Track"
                },
                success: function(response){
                    resp = response.result.results;
                    var embed = resp[0].embedUrl;
                    //R.player.play({source:resp[0].key});

                    $("#container").prepend('<object width="390" height="80"><param name="movie" value="'+embed+'"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="'+embed+'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="390" height="80"></embed></object>');
                    R.player.next();
                },
                error: function(response){
                    console.log("2");
                    console.log("error: " + response.message);
                }
            });

            /*$("#playPause").click(function(evt){
                R.player.togglePause();
            });*/

            $("#next").click(function(evt){
                numSong++;
                R.player.play({source:resp[numSong].key});
            });
        });

            $('#next').click(function()
            {
                doItAgainYes();
            });


    var selected = $('#name').val();
         $.ajax({
         type: "GET",
         url : "http://api.tumblr.com/v2/tagged?tag="+food+"&api_key=fuiKNFp9vQFvjLNvx4sUwti4Yb5yGutBN4Xh10LXZhhRKjWlV4",
         dataType: "jsonp",
         
         success: function(response) {
             var photoslen = response.response;
             var randomNumber = Math.floor(Math.random() * photoslen.length);
             var photos = response.response[Number(randomNumber)].photos;
             console.log("success");
            var count = 0 ; 
             while(!photos)
             {
                 randomNumber = Number(randomNumber) +1;
                 count = Number(count) + 1;
                 photos = response.response[Number(randomNumber)].photos;
                 if(count == 10)
                 {
                     randomPic();
                     alert("cannot find");
                     exit();
                 }
             }
             console.log(photos[0].original_size.url);
             
                $('#container').prepend('<h2>'+fullfood+'</h2>');   
                var randomNumberHeight = 300;
                $("#imgDiv").append("<img src=\""+photos[0].original_size.url+"\" height=\""+randomNumberHeight+"\" />");

         },
     });

    function doItAgainYes(i)
    {
        console.log("calling this");
        $.ajax({
                type: "GET",
                url : "http://api.tumblr.com/v2/tagged?tag="+food+"&api_key=fuiKNFp9vQFvjLNvx4sUwti4Yb5yGutBN4Xh10LXZhhRKjWlV4",
                dataType: "jsonp",
                success: function(response) {
                var photoslen = response.response;
                var randomNumber = Math.floor(Math.random() * photoslen.length);
                var photos = response.response[Number(randomNumber)].photos;
                console.log("success");
                var count = 0 ; 
            while(!photos)
            {
                randomNumber = Number(randomNumber) +1;
                count = Number(count) + 1;
                photos = response.response[Number(randomNumber)].photos;
                if(count == 10)
                {
                    randomPic();
                    alert("cannot find");
                    exit();
                 }
            }
            console.log(photos[0].original_size.url);
            var randomNumberWidth = Math.floor(Math.random() * 200) + 100;

            var randomNumberHeight = 300;
                $("#imgDiv").append("<img src=\""+photos[0].original_size.url+"\" height=\""+randomNumberHeight+"\" />");

         },
     });
    }

    function randomPic()
    {
         console.log("calling this");
        $.ajax({
                type: "GET",
                url : "http://api.tumblr.com/v2/tagged?tag=random&api_key=fuiKNFp9vQFvjLNvx4sUwti4Yb5yGutBN4Xh10LXZhhRKjWlV4",
                dataType: "jsonp",
                success: function(response) {
                var photoslen = response.response;
                var randomNumber = Math.floor(Math.random() * photoslen.length);
                var photos = response.response[Number(randomNumber)].photos;
                console.log("success");
                var count = 0 ; 
                while(!photos)
                {
                    randomNumber = Number(randomNumber) +1;
                    count = Number(count) + 1;
                    photos = response.response[Number(randomNumber)].photos;
                    if(count == 10)
                    {
                        alert("cannot find");
                        exit();
                    }
                }
                console.log(photos[0].original_size.url);
                 
                var randomNumberWidth = Math.floor(Math.random() * 200) + 100;
                 var randomNumberHeight = 300;
                $("#imgDiv").append("<img src=\""+photos[0].original_size.url+"\" height=\""+randomNumberHeight+"\" />");

            },
        });
    }
        });



    $('#container').append('<form action="send.php" method="get"><input type="text" name="id" style="width:200px; height:25px"></input><input type="hidden" value="http://rd.io/x/QitDQE0e/" name="songUrl"></input><input class="button" type="submit" value="Send Email"></input></form>');

     </script>
     </body>
 </html>

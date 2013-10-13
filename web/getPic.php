<!doctype html>
<html>
     <head>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://www.rdio.com/api/api.js?client_id=t_oGZ_-05KslYrSGzCwnsQ"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="rdio-utils.js"></script>
    </head>
    <body>
        <button id="playPause">Play</button>
        <button id="next" value= "next">next</button>
        <div id="someimage">
        </div>
     <script>
        var food  = '<?php session_start(); echo $_SESSION['foodName'];?>';

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
                    console.log(response);
                    resp = response.result.results;
                    R.player.play({source:resp[0].key});
                    R.player.next();
                },
                error: function(response){
                    console.log("2");
                    console.log("error: " + response.message);
                }
            });

            $("#playPause").click(function(evt){
                R.player.togglePause();
            });

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
             var i = 0 ; 
             for(; i < photos.length ; i++)
             {
                $('#someimage').append("<img src='"+photos[i].original_size.url+"'></img>");
             }
         },
     });

    function doItAgainYes()
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
            var i = 0 ; 
            for(; i < photos.length ; i++)
            {
                $('#someimage').append("<img src='"+photos[i].original_size.url+"'></img>");
            }
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
                var i = 0 ; 
                for(; i < photos.length ; i++)
                {
                    $('#someimage').append("<img src='"+photos[i].original_size.url+"'></img>");
                }
            },
        });
    }
     </script>
     </body>
 </html>

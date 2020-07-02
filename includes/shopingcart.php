<?php session_start (); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="../css/lgstyle.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script>
      var myId = 0;
      function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }

      function update () {
        var tots = 0;
        for (var i = 1; i <= myId; i ++) {
          var a = document.getElementById (i).value; 
          var cur = parseInt ($("#total-price_"+i).html()) * parseInt (a);
          tots+= cur;
        }
        $("#totalsum").html (tots);
      }

      function sub (id) {
        var x = document.getElementById (id).value;
        var value = parseInt (x);
    		if (value > 1) {
      		value = value - 1;
    		} else {
    			value = 1;
    		}
        $('#'+id).val(value);

        update ();
      }
      

    	function add (id) {
        var x = document.getElementById (id).value;
        var value = parseInt (x);
    		if (value < 100) {
      		value = value + 1;
    		} else {
    			value = 100;
    		}
        $('#'+id).val(value);
        
        update ();
      }
    </script>

    <script>
      var nameOfCookie = "userItems_";
      <?php 
      if (!isset ($_SESSION['userId'])) {
        $_SESSION['userId'] = "guest";
      }
      ?>
      nameOfCookie += "<?php echo $_SESSION['userId'];?>"; 
      var myCookie = getCookie (nameOfCookie);
      //alert (myCookie);
      myCookie = JSON.parse (myCookie);
      var used = [];
      for (var i = 0; i < 22; i ++) {
        used[i] = 0;
      }
      for (var i = 0; i < myCookie.length; i ++) {
        used[myCookie[i]["value"]] = true;
      }
      var mymap = [];
      $.getJSON ('data.json', function (data) {       
        $.each (data, function (key, value) {
          if (used[value.id] == true) {
            myId ++;
            mymap[myId] = value.id;
            $("#result").append ('<div class="item"><div class="buttons"><span class="delete-btn"></span></div><div class="image"><img src="../img/'+value.id+'_small.jfif" width="75px" height = "75px" alt=""/></div><div class="description"><span>'+value.name+'</span><span></span></div><div class="quantity"><button class="plus-btn" type="button" name="button" onclick="add('+myId+')"><img src="../img/plus.svg" alt="" /></button><input type="text" name="name" value="1" id = "'+myId+'"><button class="minus-btn" type="button" name="button" onclick="sub('+myId+')"><img src="../img/minus.svg" alt="" /></button></div><p class="total-price" id = "total-price_'+myId+'">'+value.price+'</p></div>');
          }
        });
      });
      function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }

      function makeCookie () {
          update ();
          var array = [];
          for (var i = 1; i <= myId; i ++) {
            var a = document.getElementById (i).value;
            var cnt = parseInt (a);
            var id = mymap[i];
            var d = {
              id, cnt
            };
            array.push (d);
          }
          var originalData = JSON.stringify (array);
          var nameOfCookie = "userBuyItems_";
            <?php 
              if (!isset ($_SESSION['userId'])) {
                $_SESSION['userId'] = "guest";
              }
            ?>
            nameOfCookie += "<?php echo $_SESSION['userId'];?>"; 
            setCookie (nameOfCookie, originalData, 1);
      }    
    </script>
  </head>
  <body>
    <nav>
      <div class="logo">
        <ul>
          <li><a href="../index.php">home</a></li>
        </ul>
      </div>
    </nav>
    <div class="shopping-cart">
      <div class="title">
        Shopping Bag
      </div>
      <div id="result" name="result">
      </div>
      <div class="footer">
        <div class="left_side">
          Total sum:
        </div>
        <div id = "totalsum" name = "totalsum" class="right_side"></div>
        <button name = "buyButton" id = "buyButton" onclick = "makeCookie ()"><a href="shoppingcart.inc.php">BUY</a></button>
      </div>

      <script>
      </script>      
    </div>
  </body>
</html>
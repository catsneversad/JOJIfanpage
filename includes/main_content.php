    <section id="section-1">
      <div class="parallax">    
        <div class="player">
          <table id="playlist">
            <tr>
              <td><h1>some brilliants /</h1></td>
            </tr>
            <tr>
              <td><a href="#" onmousedown="run.play()" class="not-current">run</a></td>
              <td><a href="#" onmousedown="run.play()" class="not-current">slow dancing in the dark</a></td>
              <td><a href="#" onmousedown="run.play()" class="not-current">no fun</a></td>
            </tr>
            <tr>
              <td><a href="#" onmousedown="yr.play()" class="not-current">yeah right</a></td>
              <td><a href="#" onmousedown="yr.play()" class="not-current">sanctuary</a></td>
              <td><a href="#" onmousedown="yr.play()" class="not-current">attention</a></td>
            </tr>
            <tr>
              <td><a href="#" onmousedown="wm.play()" class="not-current">worldstar money</a></td>
              <td><a href="#" onmousedown="wm.play()" class="not-current">test drive</a></td>
              <td><a href="#" onmousedown="wm.play()" class="not-current">can't get over you</a></td>
            </tr>
          </table>
          <script src="https://code.jquery.com/jquery-2.2.0.js"></script>
          <script>
            audioPlayer();
          </script> 
        </div>
      </div>
    </section>

    <section id="section-2" class = "sec2">
      <div class="bpl">      
        <p>Tour dates /</p>
      </div>
      <br><br><br><br>
      <div class="bpl">
        <a href="#section-2" class="btt-current" id = "firstAA" onclick="changeDate1()">present</a><div class="bth-month">/</div><a href="#section-2" class="btt-not-current" onclick="changeDate2()" id = "secondAA">past</a>
      </div>
      <div class = "affiche_div">   
        <div class = "affiche_table_past">
          <div class="event-row">
            <div class="event-cell-date">
              <span class="bth-day">22</span>
              <span class="bth-month">mar.</span>
            </div>
            <div class="event-cell-address">
              <span class="bth-location">tokyo, jp</span>
            </div>
            <button class="ntfbp">
              <span>
              Notify me
              </span>
            </button>
          </div>
          <div class="event-row">
            <div class="event-cell-date">
              <span class="bth-day">23</span>
              <span class="bth-month">mar.</span>
            </div>
            <div class="event-cell-address">
              <span class="bth-location">kyoto, jp</span>
            </div>
            <button class="ntfbp">
              <span>
              Notify me
              </span>
            </button>
          </div>
          <div class="event-row">
            <div class="event-cell-date">
              <span class="bth-day">25</span>
              <span class="bth-month">mar.</span>
            </div>
            <div class="event-cell-address">
              <span class="bth-location">nagasaki, jp</span>
            </div>
            <button class="ntfbp">
              <span>
              Notify me
              </span>
            </button>
          </div>
        </div>

        <div class = "affiche_table_future">
          <div class="event-row">
            <div class="event-cell-date">
              <span class="bth-day">12</span>
              <span class="bth-month">apr.</span>
            </div>
            <div class="event-cell-address">
              <span class="bth-location">san_francisco, ca</span>
            </div>
            <button class="ntfb">
              Notify me
            </button>
          </div>
          <div class="event-row">
            <div class="event-cell-date">
              <span class="bth-day">14</span>
              <span class="bth-month">apr.</span>
            </div>
            <div class="event-cell-address">
              <span class="bth-location">los_angeles, ca</span>
            </div>
            <button class="ntfb">
              Notify me
            </button>
          </div>
          <div class="event-row">
            <div class="event-cell-date">
              <span class="bth-day">16</span>
              <span class="bth-month">apr.</span>
            </div>
            <div class="event-cell-address">
              <span class="bth-location">phoenix, az</span>
            </div>
            <button class="ntfb">
              Notify me
            </button>
          </div>
          <div class="event-row">
            <div class="event-cell-date">
              <span class="bth-day">18</span>
              <span class="bth-month">apr.</span>
            </div>
            <div class="event-cell-address">
              <span class="bth-location">austin, tx</span>
            </div>
            <button class="ntfb">
              Notify me
            </button>
          </div>
          <div class="event-row">
            <div class="event-cell-date">
              <span class="bth-day">20</span>
              <span class="bth-month">apr.</span>
            </div>
            <div class="event-cell-address">
              <span class="bth-location">new_york_city, ny</span>
            </div>
            <button class="ntfb">
              Notify me
            </button>
          </div>
          <div class="event-row">
            <div class="event-cell-date">
              <span class="bth-day">22</span>
              <span class="bth-month">apr.</span>
            </div>
            <div class="event-cell-address">
              <span class="bth-location">washington, dc</span>
            </div>
            <button class="ntfb">
              Notify me
            </button>
          </div>
          <div class="event-row">
            <div class="event-cell-date">
              <span class="bth-day">25</span>
              <span class="bth-month">apr.</span>
            </div>
            <div class="event-cell-address">
              <span class="bth-location">boston, ma</span>
            </div>
            <button class="ntfb">
              Notify me
            </button>
          </div>
        </div>
      </div>
    </section>

    <section id="section-3">
      <div class="parallax2">
        <div class="videolist">
          <table id="vplaylist">
            <tr><td><h1>
              videolist /
            </h1></td></tr>
            <tr>
              <td><a href="#section-3" class="current">balladas 1</a></td>
            </tr>
            <tr>
              <td><a href="#section-3" class="not-current" >pink season</a></td>
            </tr>
            <tr>
              <td><a href="#section-3" class="not-current">in tongues</a></td>
            </tr>
            <tr>
              <td><a href="#section-3" class="not-current">pink season: the prophecy</a></td>
            </tr>
          </table>
          <script src="https://code.jquery.com/jquery-2.2.0.js"></script>
          <script>
            videoPlayer();
          </script>      
        </div>   
        <div class="JOJIvideo">
          <h1> fresh videos /</h1>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/CGXhyRiXR2M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id = "videoFromYoutube"></iframe>
          <a href="https://youtu.be/CGXhyRiXR2M" id = "linkFromYoutube"><h2> liked this</h2></a>
        </div>
      </div>
    </section>

    <section id="section-4">
      <div class="biopart">
        <div class="sliider">
          <img src="img/1.jpg" class="slider-image" />
          <br>
          <p>
            sub to his socials /
          </p> <br>
          <div class="social-menu">
            <ul>
              <li><a href="facebook.com/jojikansai"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/FilthyFrank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/sushitrash"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://www.youtube.com/user/TVFilthyFrank"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="infoContainer">
          <a href="https://en.wikipedia.org/wiki/Joji_(musician)"><h1>about him /</h1></a>
          <br><br>
          <p>
            George Kusunoki Miller (born 18 September 1992), <font color="#ef2e6c"> better known by his stage name Joji and formerly by his online aliases Filthy Frank and Pink Guy, </font> is a Japanese singer, songwriter, rapper, record producer, author, and former Internet personality and comedian.
          </p>
          <br>
          <p>
            <font color="#ef2e6c"> Miller's </font> start as an entertainer began on his now defunct YouTube <font color="#ef2e6c"> channels, DizastaMusic, TooDamnFilthy, and TVFilthyFrank, </font> that consisted of rap songs, rants, extreme challenges, ukulele performances and <font color="#ef2e6c"> a shock humor show titled The Filthy Frank Show </font>, with most of the main characters played by Miller, including the titular character of Filthy Frank. To complement his TVFilthyFrank channel, Miller produced comedy hip hop music under his Pink Guy alias, who is also a zentai-wearing recurring character on The Filthy Frank Show, with his songs featured on the show and his discography spanning two full-length projects and an extended play. Miller's videos had widespread impact, including starting a viral dance craze known as the Harlem Shake, which was directly responsible for the debut of Baauer's "Harlem Shake" song atop the Billboard Hot 100. Many YouTube personalities have made major or cameo appearances on The Filthy Frank Show, including h3h3Productions, iDubbbz, JonTron, Michael Stevens, and PewDiePie
          </p>
        </div>
      </div>
    </section>

    <!-- <script>
      function show () {
        alert ("hello");
      }
    </script> -->

    <section id="section-5">
      <div class="parallax3" id = "parallax3" name = "parallax3">
        <div class="firstPart">
          <input type="checkbox" id="Box1" name="Box1" onclick="show()">
          <label for="vehicle1" class="nice"> Accessories </label><br>
          <input type="checkbox" id="Box2" name="Box2" onclick="show()">
          <label for="vehicle2" class="nice"> Hats </label><br>
          <input type="checkbox" id="Box3" name="Box3" onclick="show()">
          <label for="vehicle3" class="nice"> Hoodies </label><br>
          <input type="checkbox" id="Box4" name="Box4" onclick=" show()">
          <label for="vehicle3" class="nice"> Jackets </label><br>
          <input type="checkbox" id="Box5" name="Box5" onclick="show()">
          <label for="vehicle3" class="nice"> Shirts</label><br>
          <button onclick="makeCookie()"><a href="includes/shopingcart.php">Go to shopping cart</a></button>
          <?php if (isset ($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <button><a href="includes/add_to_shop.php">ADD SOMETHING TO SHOP</a></button>
          <?php endif; ?>
        </div>
        <script>
          function add (value) {
            if (was[value] == 0) {
              was[value] = 1;
              var id = array.length + 1;
              var d = {
                id, value
              };
              array.push (d); 
              var originalData = JSON.stringify (array);
              //setCookie ("hello", originalData, 10);
            } else {
              alert ("You alerady added to your shopping cart");
            }
          }

          function makeCookie () {
            var originalData = JSON.stringify (array);
            var nameOfCookie = "userItems_";
            <?php 
              if (!isset ($_SESSION['userId'])) {
                $_SESSION['userId'] = "guest";
              }
            ?>
            nameOfCookie += "<?php echo $_SESSION['userId'];?>"; 
            setCookie (nameOfCookie, originalData, 1);
          }

          function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
          }

          function show () {
              //alert ("hello");
              $("#result").empty ();
              var cnt = [];
              for (var i = 1; i <= 5; i ++) {
                var boxName = "Box" + i;
                var curDoc = document.getElementById (boxName);
                if (curDoc.checked == true) {
                  cnt[cnt.length+1]=i;
                }
              }      
                            
              if (cnt.length == 0) {
                $.getJSON ('includes/data.json', function (data) {       
                  $.each (data, function (key, value) {
                    var x = 'onclick = "add(' + value.id + ')"';
                    $('#result').append ('<div class="col-md-3"><figure class="card card-product"><div class="img-wrap"><a href="includes/review_item.php?id='+value.id+'"><img src="'+value.url+'"></a></div><figcaption class="info-wrap"><h6 class="title text-dots"><a href="#">'+value.name+'</a></h6><div class="action-wrap"><button class="btn btn-primary btn-sm float-right" '+x+'>Order</button><div class="price-wrap h5"><span class="price-new">'+value.price+'KZT</span></div></div></figcaption></figure></div>');
                  });
                });
              }

              if (cnt.length >= 1) {
                // for (var i = 0; i < cnt.lenght; i ++)
                //   alert (cnt[i]);
                var productNames = ['Accessorie', 'Hat', 'Hoodie', 'Jacket', 'Shirt'];
                $.getJSON ('includes/data.json', function (data) {       
                  $.each (data, function (key, value) {
                    var was = false;
                    for (var i = 0; i < cnt.length; i ++) {
                      if (productNames[cnt[i]-1] == value.class)
                        was = true;
                    } 
                    if (was) {
                      var x = 'onclick = "add(' + value.id + ')"';
                      $('#result').append ('<div class="col-md-3"><figure class="card card-product"><div class="img-wrap"><img src="'+value.url+'"></div><figcaption class="info-wrap"><h6 class="title text-dots"><a href="#">'+value.name+'</a></h6><div class="action-wrap"><button class="btn btn-primary btn-sm float-right" '+x+'>Order</button><div class="price-wrap h5"><span class="price-new">'+value.price+'KZT</span></div></div></figcaption></figure></div>');
                    }
                  });
                });
              }
            }
        </script>
            <script>show();</script>
          <div class="row" id="result" name="result"></div>
      </div>
    </section>


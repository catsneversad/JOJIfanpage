var run = new Audio();
run.src = "music/joji_run.mp3"

var yr = new Audio();
yr.src = "music/joji_yr.mp3"

var wm = new Audio();
wm.src = "music/joji_wm.mp3"


function audioPlayer() {
    var a = document.querySelectorAll("#playlist tr td a");
    $("#playlist tr td a").click(function(e) {
        var i, j, bg = -1;
        for (i = 0; i < a.length; i++) {
            if (a[i].className === "current") {
                bg = i;
            }
        }


        if (bg !== -1) {
            if (bg == 0) {
                run.pause();
                run.currentTime = 0;
            }
            if (bg == 1) {
                run.pause();
                run.currentTime = 0;
            }
            if (bg == 2) {
                run.pause();
                run.currentTime = 0;
            }
            if (bg == 3) {
                yr.pause();
                yr.currentTime = 0;
            }
            if (bg == 4) {
                yr.pause();
                yr.currentTime = 0;
            }
            if (bg == 5) {
                yr.pause();
                yr.currentTime = 0;
            }
            if (bg == 6) {
                wm.pause();
                wm.currentTime = 0;
            }
            if (bg == 7) {
                wm.pause();
                wm.currentTime = 0;
            }
            if (bg == 8) {
                wm.pause();
                wm.currentTime = 0;
            }
        }

        for (i = 0; i < a.length; i++) {
            $(a[i]).removeClass("current");
            $(a[i]).addClass("not-current");

            if (a[i] === this) {
                j = i;
            }
        }

        if (Math.floor(bg / 3) === Math.floor(j / 3)) {
            if (Math.floor(bg / 3) == 0)
                run.play();
            if (Math.floor(bg / 3) == 1)
                yr.play();
            if (Math.floor(bg / 3) == 2)
                wm.play();
        }

        if (j !== bg) {
            $(a[j]).removeClass("not-current");
            $(a[j]).addClass("current");
        }
    });
}


function changeDate1() {
    var all = document.getElementsByClassName('affiche_table_future');
    var all2 = document.getElementById('firstAA');
    var all3 = document.getElementById('secondAA');
    var kek = all2.className;

    if (kek !== 'btt-current') {
        $(all2).removeClass("btt-not-current");
        $(all2).addClass("btt-current");

        $(all3).removeClass("btt-current");
        $(all3).addClass("btt-not-current");
    }

    var i;
    for (i = 0; i < all.length; i++) {
        all[i].style.zIndex = 2;
        // $(all[i]).removeClass("btt-not-current");
        // $(all[i]).addClass("btt-current");
    }

    all = document.getElementsByClassName('affiche_table_past');
    for (i = 0; i < all.length; i++) {
        all[i].style.zIndex = -1;
        // $(all[i]).addClass("btt-current");
        // $(all[i]).removeClass("btt-not-current");
    }
}

function changeDate2() {
    var all = document.getElementsByClassName('affiche_table_past');
    var all2 = document.getElementById('firstAA');
    var all3 = document.getElementById('secondAA');
    var kek = all3.className;

    if (kek !== 'btt-current') {
        $(all3).removeClass("btt-not-current");
        $(all3).addClass("btt-current");

        $(all2).removeClass("btt-current");
        $(all2).addClass("btt-not-current");
    }

    for (var i = 0; i < all.length; i++) {
        all[i].style.zIndex = 2;

        // $(all[i]).removeClass("btt-not-current");
        // $(all[i]).addClass("btt-current");

    }
    all = document.getElementsByClassName('affiche_table_future');
    for (var i = 0; i < all.length; i++) {
        all[i].style.zIndex = -1;
        // alert (all2[i].className);
        // $(all[i]).addClass("btt-current");
        // $(all[i]).removeClass("btt-not-current");

    }
}


var links1, links2;
links1 = ["https://www.youtube.com/embed/CGXhyRiXR2M", "https://www.youtube.com/embed/0c_mhrB7LlQ", "https://www.youtube.com/embed/kU7LF5mYZkw", "https://www.youtube.com/embed/4B-wFx0aMlw"];
links2 = ["https://youtu.be/CGXhyRiXR2M", "https://youtu.be/0c_mhrB7LlQ", "https://youtu.be/kU7LF5mYZkw", "https://youtu.be/4B-wFx0aMlw"];

function videoPlayer() {
    var a = document.querySelectorAll("#vplaylist tr td a");
    $("#vplaylist tr td a").click(function(e) {
        var i, j, bg = -1;
        for (i = 0; i < a.length; i++) {
            if (a[i].className === "current") {
                bg = i;
            }
        }

        for (i = 0; i < a.length; i++) {
            $(a[i]).removeClass("current");
            $(a[i]).addClass("not-current");

            if (a[i] === this) {
                j = i;
            }
        }

        if (j !== bg) {
            $(a[j]).removeClass("not-current");
            $(a[j]).addClass("current");
            document.getElementById("videoFromYoutube").src = links1[j];
            document.getElementById("linkFromYoutube").href = links2[j];
        }
        if (j === bg) {
            $(a[j]).removeClass("not-current");
            $(a[j]).addClass("current");
        }
    });
}
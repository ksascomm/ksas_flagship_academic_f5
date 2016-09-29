var $u = jQuery.noConflict();
$u(document).ready(function () { // Backstretch

    var images = []; // regular array (add an optional integer
    images[0] = "wp-content/themes/ksas_flagship_academic_biology_f5/assets/img/ara.jpg";
    images[1] = "wp-content/themes/ksas_flagship_academic_biology_f5/assets/img/clippflare.jpg";
    images[2] = "wp-content/themes/ksas_flagship_academic_biology_f5/assets/img/primus.jpg";
    images[3] = "wp-content/themes/ksas_flagship_academic_biology_f5/assets/img/cluster.jpg";

    Array.prototype.shuffle = function () {
        var len = this.length;
        var i = len;
        while (i--) {
            var p = parseInt(Math.random() * len);
            var t = this[i];
            this[i] = this[p];
            this[p] = t;
        }
    };

    images.shuffle();

    // A little script for preloading all of the images
    // It's not necessary, but generally a good idea
    $u(images).each(function () {
        $u('<img/>')[0].src = this;
    });

    var index = 0;
    $u("#photo").backstretch(images[index], {
        speed: 10
    });
});

var $a = jQuery.noConflict();
$a(document).ready(function() {
  $a('#photo img').each(function(){
    var $img = $a(this);
    var filename = $img.attr('src')
    $img.attr('alt', " ");
  });
});
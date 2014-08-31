<?php
    require_once './MovieService.php';
    $ms = new MovieService();
    $r = new stdClass();
    $r = $ms->detail($_GET['detailID']);
    
?>
<html>
    <head>
        <title><?php echo $r->title ?></title>
        <meta name="MungKud" content="MungKud 1.0.6.0428">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="เว็บดูหนังออนไลน์ฟรี ที่มีหนังเยอะที่สุดในตอนนี้ หนังไทยมาใหม่ชนโรง หนังฝรั่ง จีน ต่างประเทศ การ์ตูน ซีรี่ย์เกาหลี ดูหนังฟรี &quot;หนัง HD&quot; Siam-Movie.Com">
        <meta name="keywords" content="เว็บดูหนัง, ดูหนัง, หนังHD, ดูหนังออนไลน์, ดูซีรีย์,ดูการ์ตูน,ดูอนิเมชั่น,ดูหนังออนไลน์ HD,ดูหนังฟรี,หนังไทย">
        <meta name="description" content="ดูหนังออนไลน์ ดูหนัง HD ที่นี่มีหนังใหม่ให้ดูกันทุกวัน อัพเดทเร็ว ดูหนังใหม่ก่อนใคร ทั้งหนังไทย หนังมาสเตอร์ ดูหนังฟรีทั้งเว็บ">
        <meta name="keywords" content="ดูหนังออนไลน์,ดูหนัง HD,หนังใหม่,ดูหนังใหม่,หนังออนไลน์,หนังมาสเตอร์,หนังไทย,หนังฝรั่ง,หนังออนไลน์,ดูหนังฟรี,ดูหนังออนไลน์ใหม่,ดูหนังออนไลน์ฟรี">
        <meta property="og:title" content="ดูหนังออนไลน์ HD ดูหนังใหม่ หนังไทย ต่างประเทศ">
        <meta property="og:description" content="ดูหนังออนไลน์ ดูหนัง HD ที่นี่มีหนังใหม่ให้ดูกันทุกวัน อัพเดทเร็ว ดูหนังใหม่ก่อนใคร ทั้งหนังไทย หนังมาสเตอร์ ดูหนังฟรีทั้งเว็บ">
        <meta property="og:url" content="https://www.thai-movies.net/">
        <meta property="og:site_name" content="ดูหนังออนไลน์ HD ดูหนังใหม่ หนังไทย ต่างประเทศ">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta property="og:title" content="<?php echo $r->title ?>" />
        <meta property="og:image" content="http://www.thai-movies.net/<?php echo $r->thumbnail ?>"  />
        <meta property="og:url" content="http://www.thai-movies.net/watch.php?detailID=<?php echo $r->id ?>" />
        <meta property="og:description" content="<?php echo $r->desc ?>" />
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <link rel='stylesheet' type="text/css" href="css/main.css?n=<?php echo time(); ?>" />
        <script>
            $(function(){
                 $('*').attr('oncontextmenu', 'return false;');
               t=$;
               $='a';
               Jquery = 'a';
            });
        </script>
        <style>
            body{
                background-color: black;
            }
        </style>
    </head>
    <body style="margin:0px;">
        <div id="movies-title"><label>ดูหนังออนไลน์ HD ฟรี หนังไทย หนังเกาหลี ต่างประเทศ ซี่รี่ย์เกาหลี</label><br/><label>Thai-Movies.net</label></div>
        <div id="detailmovie">
            <div></div>
            <div>
                <img src="<?php echo $r->thumbnail ?>" />
                <div id="desc">
                    <label> <?php echo $r->title ?></label>
                    <p><?php echo $r->desc ?><p>
                </div>
            </div>
            <div></div>
        </div>
        <div id="MoviesShow">
                <?php echo base64_decode($r->videoLink) ?>
            <!--<video style="width:100%"controls="" autoplay="" name="media"><source src="" type="video/mp4"></video>-->
        </div>
    </body>
</html>
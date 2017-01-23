<?php

use PHPUnit\Framework\TestCase;
use Yakovmeister\ScrapeQL\Struct;

class StructTest extends TestCase
{

	protected $instance;

	protected $haystack;

	public function setUp()
	{
		$this->instance = new Struct;

		$this->haystack = <<< EOT



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
	
    KissAnime - Watch anime online in high quality

</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta property="fb:admins" content="100006233868825" /><meta property="fb:app_id" content="130397647116314" />
<script type="text/javascript" src="/Scripts/jquery17.min.js"></script>
<!-- CSS -->
<link href="/Content/css/tpl_style.css?v=5" rel="stylesheet" type="text/css" />
<link href="/Content/css/upload-progress.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/Content/images/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="/Scripts/google.js"></script>
<!--[if IE 6]><link href="/Content/css/tpl_ie_6.css"  rel="stylesheet" type="text/css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="/Content/css/tpl_ie_7.css" /><![endif]-->
<!--[if IE 8]><link rel="stylesheet" type="text/css" href="/Content/css/tpl_ie_7.css" /><![endif]-->

    <meta name="description" content="KissAnime Official Website - Watch anime online in high quality. Free download high quality anime. Various formats from 240p to 720p HD (or even 1080p). HTML5 available for mobile devices" />
    <meta name="keywords" content="KissAnime, Watch high quality anime online, anime english sub, anime english dub, watch anime online, anime online, anime html5, anime streaming, anime mobile" />
    <link rel="stylesheet" href="../../Content/ui-lightness/jquery.ui.all.css">

	
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
  m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-1712467-23', 'auto');
    ga('send', 'pageview');

</script>

</head>
<body>

    <div id="containerRoot">
        <div id="head">
            <h3>
                
<div style="position: relative; text-align: right; margin: -40px 46px 20px 0px; font: bold 13px Arial;">
    
    <div id="topHolderBox" style="width: 230px; height: 30px;">
        <img src="http://kissanime.ru/Content/images/user-small.png" style="vertical-align: middle; margin-bottom: 5px">
        Please <a href="http://kissanime.ru/Login">login</a>
        or <a href="http://kissanime.ru/Register">register</a>
    </div>
    
</div>

                <div id="search" style="position: relative">
                    <form id="formSearch" method="post">
                    <p>
                        <input style="width: 250px" id="keyword" name="keyword"
                            value="" class="text" autocomplete="off" />
                        <input id="imgSearch" type="image" src="http://kissanime.ru/Content/images/search.png"
                            class="button" onclick="return false;" />
                    </p>
                    <div id="result_box" style="display: none; left: 57px; margin-top: -3px; max-height: 300px; overflow-y: auto; overflow-x: hidden;">
                    </div>
                    <div style="float: left; width: 210px; text-align: left; margin-left: 58px;">
                        <div style="float: left; width: 85px">
                            <!-- Place this tag where you want the +1 button to render. -->
                            <div class="g-plusone" data-size="medium" data-href="http://kissanime.com">
                            </div>
                            <!-- Place this tag after the last +1 button tag. -->
                            <script type="text/javascript">
                                (function () {
                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                    po.src = 'https://apis.google.com/js/plusone.js';
                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                })();
                            </script>
                        </div>
                    </div>
                    <div style="margin: 10px 48px 10px 0">
                        <a href="http://kissanime.ru/AdvanceSearch">
                            <img src="http://kissanime.ru/Content/images/read.png"
                                width="16px" border="0" style="vertical-align: middle" />&nbsp;&nbsp;Advanced
                            Search</a>
                    </div>
                    </form>
                </div>
                <script type="text/javascript">
                    $('#imgSearch').click(function () {
                        Submit();
                    });

                    var delay = (function(){
                          var timer = 0;
                          return function(callback, ms){
                            clearTimeout (timer);
                            timer = setTimeout(callback, ms);
                          };
                        })();

                    $('#keyword').keyup(function() {
                        delay(function(){
                          Suggest();
                        }, 500 );
                    });

                    $('#selectSearch').change(function () {
                        Suggest();
                    });

                    $("#selectSearch option").each(function () {
                        var url = location.href;
                        if (url.indexOf($(this).attr('value')) != -1)
                            $(this).attr("selected", "selected");
                    });

                    function Submit() {
                        if ($.trim($('#keyword').val()).length < 2) {
                            $('#keyword').blur();
                            alert('Keyword must be more than one character!');
                        }
                        else {
                            $("#formSearch").attr('action', "/Search/Anime");
                            $("#formSearch").submit();
                        }
                    }

                    function Suggest() {
                        //return;

                        var keyword = $.trim($('#keyword').val());
                        if (keyword != "" && $.trim($('#keyword').val()).length > 2) {
                            $('#result_box').html("<span id='loader'></span>");
                            $('#result_box').css('display', 'block');
                            $.ajax(
                            {
                                type: "POST",
                                url: "/Search/SearchSuggestx",
                                data: "type=Anime" + '&keyword=' + keyword,
                                success: function (message) {
                                    if (message != "") {
                                        message += '<a href="#" onclick="return false;">---------------</a>';
                                        message += '<a href="#" onclick="return false;">PRESS ENTER TO VIEW MORE...</a>';

                                        $('#result_box').html(message);
                                    }
                                    else {
                                        $('#result_box').html('<a href="#" onclick="return false;">PRESS ENTER TO SEARCH...</a>');
                                    }
                                }
                            });
                        }
                        else {
                            $('#result_box').html('');
                            $('#result_box').css('display', 'none');
                        }
                    }
                </script>
            </h3>
            <h1>
                <a href="http://kissanime.ru" title="KissAnime.ru - High quality anime online"
                    class="logo">KissAnime.ru</a></h1>
        </div>        
        <!-- end div head -->
        <div class="clear">
        </div>
        <div id="headnav">
            
<div id="navbar">
    <div id="navcontainer">
        <ul>
            <li id="liHome"><a href="http://kissanime.ru">Home</a></li>
            <li id="liDS"><a href="http://kissanime.ru/AnimeList">Anime
                list</a></li>
            <li id="li1"><a target="_blank" href="http://kisscartoon.se">Cartoon list</a></li>
            <li id="liMobile"><a href="/M">MOBILE</a></li>
            <li id="liReportError"><a href="/Message/ReportError">Report/Request</a></li>            
            <li id="liChatRoom"><a href="/ChatRoom">
                Chat Room</a></li>
            <li id="liReadManga"><a rel="nofollow" target="_blank" href="http://kissmanga.com">Read Manga</a></li>
            <li id="liWatchDrama"><a rel="nofollow" target="_blank" href="http://kissasian.com">Watch Drama</a></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    var path = 'Home';
    if (path == 'Home')
        $('#liHome a').attr('id', 'currentTab');
    else if (path == 'Anime' || path == 'Genre' || path == 'Group')
        $('#liDS a').attr('id', 'currentTab');
    else if (document.URL.indexOf('GoPremium') >= 0)
        $('#liGoPremium a').attr('id', 'currentTab');
    else if (document.URL.indexOf('FreeDownload') >= 0)
        $('#liDS a').attr('id', 'currentTab');
    else if (document.URL.indexOf('FAQ') >= 0)
        $('#liFAQ a').attr('id', 'currentTab');
    else if (path == 'Error')
        $('#liReport a').attr('id', 'currentTab');
    else if (document.URL.indexOf('ChatRoom') >= 0)
        $('#liChatRoom a').attr('id', 'currentTab');
    else
        $('#navcontainer a[href*="' + path + '"]').attr('id', 'currentTab');
</script>

    <div id="navsubbar">
        <p>
            
            <a title="Bookmarks, quality, autoplay etc." href="/Register/Member">Register for MORE
                options</a> |
            <a href="/UpcomingAnime/">Upcoming anime</a>
        </p>
    </div>

        </div>        
        <!-- end div headnav -->
        
    <script src="../../Scripts/customjavascript.js?v=1" type="text/javascript"></script>
    <script src="../../Scripts/jquery.tools.min.js" type="text/javascript"></script>
    <div id="container">
        <div id="leftside">
            <div class="clear">
            </div>
            <div class="banner">
                <!-- Random Anime -->
                
                <div class="details" style="position: relative; line-height: 18px;">
                    <div id="divRandomAnime">
                        <a id="aRandomAnimeResult" custom="Ookami-san-to-Shichinin-no-Nakama-tachi" href="/Anime/Ookami-san-to-Shichinin-no-Nakama-tachi"><img width="150px" height="195px" src="https://myanimelist.cdn-dena.com/images/anime/9/75240.jpg" /></a><div style="float: left; width: 540px"><a class="bigChar" href="/Anime/Ookami-san-to-Shichinin-no-Nakama-tachi">Ookami-san to Shichinin no Nakama-tachi (Sub)</a> <p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/Parody" class="dotUnder" title="Anime that imitate other stories (can be from TV, film, books,  historical events, ...) for comic effect by exaggerating the style and  changing the content of the original. Also known as spoofs. This is a  sub-genre of comedy.">Parody</a><span class="info">,</span> <a href="/Genre/Romance" class="dotUnder" title="Anime whose story is about two people who each want [sometimes unconciously] to win or keep the love of the other. This kind of anime might also fall in the &#39;Ecchi&#39; category, while &#39;Romance&#39; and &#39;Hentai&#39; generally contradict each other.">Romance</a></p><p title="Ookami Ryouko is a spunky and, by some accounts, rather manly high school girl. She is tall, speaks in a traditionally masculine way and is very proficient in fighting. Ookami-san&#39;s best friend is the small and high-pitched voiced Akai Ringo. Incidentally, the two are rather flat-chested, a fact the Narrator (voiced by Arai &quot;Kuroko&quot; Satomi of Railgun fame) is all too eager to point out.  Ookami and Ringo are members of the Otogi Bank, a club in Otogi High School that assists students with their problems in return for their assistance on a different problem at a later date; thus the Otogi Bank is effectively a loan institute for problems where you can take out a loan for a solved problem but you have to repay it sooner or later.  The Otogi Bank is able to solve any problem and will go to any lengths to do so, often leading the members to danger or mayhem. Since most of the members of the club are female, another male is needed for the more dangerous assignments. Thus, the scopophobic (the fear of being looked at) Morino Ryoushi is inducted as a member, right after he confesses his love for Ookami...">Ookami Ryouko is a spunky and, by some accounts, rather manly high school girl. She is tall, speaks in a traditionally masculine way and is very proficient in fighting. Ookami-san's best friend is the small and high-pitched voiced Akai Ringo. Incidentally, the two are rather flat-chested, a fact the Narrator (voiced by Arai "Kuroko" Satomi of Railgun ...</p></div>
                    </div>
                    <div id="divReload" style="position: absolute; width: 120px; top: 177px; left: 650px">
                        <a id="btnReloadRandom" title="Get random anime" href="#" onclick="return false;">
                            <img style="border: 0px;" src="/Content/images/random.png" /></a>
                    </div>
                    <div id="divShowGenre" style="position: absolute; width: 300px; top: 177px; left: 529px;
                        display: none">
                        <div style="display: inline-block; vertical-align: top;">
                            <select id="selectGenre" name="selectGenre">
                                <option value="All" selected>All</option>
                                
                                <option value="Action">
                                    Action</option>
                                
                                <option value="Adventure">
                                    Adventure</option>
                                
                                <option value="Cars">
                                    Cars</option>
                                
                                <option value="Cartoon">
                                    Cartoon</option>
                                
                                <option value="Comedy">
                                    Comedy</option>
                                
                                <option value="Dementia">
                                    Dementia</option>
                                
                                <option value="Demons">
                                    Demons</option>
                                
                                <option value="Drama">
                                    Drama</option>
                                
                                <option value="Dub">
                                    Dub</option>
                                
                                <option value="Ecchi">
                                    Ecchi</option>
                                
                                <option value="Fantasy">
                                    Fantasy</option>
                                
                                <option value="Game">
                                    Game</option>
                                
                                <option value="Harem">
                                    Harem</option>
                                
                                <option value="Historical">
                                    Historical</option>
                                
                                <option value="Horror">
                                    Horror</option>
                                
                                <option value="Josei">
                                    Josei</option>
                                
                                <option value="Kids">
                                    Kids</option>
                                
                                <option value="Magic">
                                    Magic</option>
                                
                                <option value="Martial-Arts">
                                    Martial Arts</option>
                                
                                <option value="Mecha">
                                    Mecha</option>
                                
                                <option value="Military">
                                    Military</option>
                                
                                <option value="Movie">
                                    Movie</option>
                                
                                <option value="Music">
                                    Music</option>
                                
                                <option value="Mystery">
                                    Mystery</option>
                                
                                <option value="ONA">
                                    ONA</option>
                                
                                <option value="OVA">
                                    OVA</option>
                                
                                <option value="Parody">
                                    Parody</option>
                                
                                <option value="Police">
                                    Police</option>
                                
                                <option value="Psychological">
                                    Psychological</option>
                                
                                <option value="Romance">
                                    Romance</option>
                                
                                <option value="Samurai">
                                    Samurai</option>
                                
                                <option value="School">
                                    School</option>
                                
                                <option value="Sci-Fi">
                                    Sci-Fi</option>
                                
                                <option value="Seinen">
                                    Seinen</option>
                                
                                <option value="Shoujo">
                                    Shoujo</option>
                                
                                <option value="Shoujo-Ai">
                                    Shoujo Ai</option>
                                
                                <option value="Shounen">
                                    Shounen</option>
                                
                                <option value="Shounen-Ai">
                                    Shounen Ai</option>
                                
                                <option value="Slice-of-Life">
                                    Slice of Life</option>
                                
                                <option value="Space">
                                    Space</option>
                                
                                <option value="Special">
                                    Special</option>
                                
                                <option value="Sports">
                                    Sports</option>
                                
                                <option value="Super-Power">
                                    Super Power</option>
                                
                                <option value="Supernatural">
                                    Supernatural</option>
                                
                                <option value="Thriller">
                                    Thriller</option>
                                
                                <option value="Vampire">
                                    Vampire</option>
                                
                                <option value="Yuri">
                                    Yuri</option>
                                
                            </select>
                        </div>
                        <div style="display: inline-block; padding-left: 5px">
                            <a id="btnReloadRandomMain" title="Get random anime" href="#" onclick="return false;">
                                <img style="border: 0px;" src="/Content/images/random.png" /></a>
                        </div>
                    </div>
                    <div id="divLoading" style="position: absolute; top: 80px; left: 313px; display: none;
                        text-align: center">
                        <img style="border: none;" src="/Content/images/loading.gif" />
                    </div>
                </div>
                <script type="text/javascript">
                    var excludedAnime = '';

                    $('#btnReloadRandom').click(function () {
                        $(this).hide();
                        $('#divShowGenre').show();

                    });

                    $('#btnReloadRandomMain').click(function () {
                        $('#divRandomAnime').hide();
                        $('#divLoading').show();
                        $('#divShowGenre').hide();
                        $.ajax(
                            {
                                type: "POST",
                                url: "/GetRandomAnime?selectGenre=" + $('#selectGenre').val() + "&excludedAnime=" + excludedAnime,
                                success: function (message) {
                                    if (message != "") {
                                        $('#divRandomAnime').html(message);
                                        $('#divLoading').hide();
                                        $('#divRandomAnime').show();
                                        $('#divShowGenre').show();

                                        if (message == "That's all anime have this genre")
                                            excludedAnime = ''
                                        else
                                            excludedAnime += $('#aRandomAnimeResult').attr('custom') + ";";
                                    }
                                }
                            });
                    });
                </script>
                <!-- end Random Anime -->
            </div>
            <!-- Ads -->
            
<div id="divAds2" style="text-align: center; overflow: hidden; width: 728px">


<iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" src="/ads/madads.aspx" width="728px" height="90px">
</iframe>

</div>

            <div class="clear2">
            </div>
            <div class="bigBarContainer">
                <div class="barTitle">
                    <div class="scrollable_title">
                        Latest update</div>
                    <div id="recently-nav">
                        <a class="prev"></a>
                        <div class="navi">
                            Page 1
                        </div>
                        <a class="next"></a>
                        <div class="clear">
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </div>
                <div class="barContent">
                    <div class="arrow-general">
                        &nbsp;</div>
                    <div class="scrollable">
                        <div class="items">
                            <div><a href="Anime/ClassicaLoid" title="Episode 015"><img width='130px' height='150px' src="https://myanimelist.cdn-dena.com/images/anime/10/82320.jpg" /><br />ClassicaLoid<br /><span class='textDark'>Episode 015</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Seiren" title="Episode 003"><img width='130px' height='150px' src="https://myanimelist.cdn-dena.com/images/anime/4/82969.jpg" /><br />Seiren<br /><span class='textDark'>Episode 003</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Future-Card-Buddyfight-DDD" title="Episode 042"><img width='130px' height='150px' src="https://myanimelist.cdn-dena.com/images/anime/4/78622.jpg" /><br />Future Card Buddyfight DDD<br /><span class='textDark'>Episode 042</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Kaitou-Joker-2nd-Season-Dub" title="Episode 018"><img width='130px' height='150px' src="https://myanimelist.cdn-dena.com/images/anime/12/64975.jpg" /><br />Kaitou Joker 2nd Season (Dub)<br /><span class='textDark'>Episode 018</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Pokemon-Sun-Moon" title="Episode 011"><img width='130px' height='150px' src="https://myanimelist.cdn-dena.com/images/anime/3/81986.jpg" /><br />Pokemon Sun and Moon (Sub)<br /><span class='textDark'>Episode 011</span></a>&nbsp;&nbsp;&nbsp;</div><div><a href="Anime/Koro-sensei-Q" title="Episode 005"><img width='130px' height='150px' src="https://myanimelist.cdn-dena.com/images/anime/10/83452.jpg" /><br />Koro-sensei Quest! (Sub)<br /><span class='textDark'>Episode 005</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Bonobono-2016" title="Episode 041"><img width='130px' height='150px' src="https://myanimelist.cdn-dena.com/images/anime/13/77617.jpg" /><br />Bonobono (2016)<br /><span class='textDark'>Episode 041</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Shouwa-Genroku-Rakugo-Shinjuu-Sukeroku-Futatabi-hen" title="Episode 003"><img width='130px' height='150px' src="https://myanimelist.cdn-dena.com/images/anime/10/82947.jpg" /><br />Shouwa Genroku Rakugo Shinjuu 2<br /><span class='textDark'>Episode 003</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Kamisama-Minarai-Himitsu-no-Cocotama" title="Episode 057"><img width='130px' height='150px' src="https://myanimelist.cdn-dena.com/images/anime/2/75829.jpg" /><br />Kamisama Minarai: Himitsu no Cocotama<br /><span class='textDark'>Episode 057</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Ao-no-Exorcist-Kyoto-Fujouou-hen" title="Episode 003"><img width='130px' height='150px' src="https://myanimelist.cdn-dena.com/images/anime/11/83418.jpg" /><br />Ao no Exorcist 2<br /><span class='textDark'>Episode 003</span></a>&nbsp;&nbsp;&nbsp;</div><div><a href="Anime/Schoolgirl-Strikers-Animation-Channel" title="Episode 003"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/4/82560.jpg" page="3" /><br />Schoolgirl Strikers: Animation Channel<br /><span class='textDark'>Episode 003</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Minami-Kamakura-Koukou-Joshi-Jitensha-bu" title="Episode 003"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/13/82440.jpg" page="3" /><br />Minami Kamakura Koukou Joshi Jitensha-bu<br /><span class='textDark'>Episode 003</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Mori-no-Yousei-Kinoko-no-Musume" title="Episode 003"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/1-6-2017/85002054593784d2a.jpg" page="3" /><br />Mori no Yousei: Kinoko no Musume<br /><span class='textDark'>Episode 003</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Fuuka" title="Episode 004"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/manga/2/186209.jpg" page="3" /><br />Fuuka<br /><span class='textDark'>Episode 004</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Youjo-Senki" title="Episode 003"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/manga/3/186468.jpg" page="3" /><br />Youjo Senki<br /><span class='textDark'>Episode 003</span></a>&nbsp;&nbsp;&nbsp;</div><div><a href="Anime/Urara-Meirochou" title="Episode 003"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/1-20-2017/98909654583870l.jpg" page="4" /><br />Urara Meirochou<br /><span class='textDark'>Episode 003</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Show-By-Rock-2nd-Season-Dub" title="Episode 012"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/4/80734.jpg" page="4" /><br />Show By Rock!! 2nd Season (Dub)<br /><span class='textDark'>Episode 012</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Coffee-Samurai" title="Special"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/1-20-2017/57073454535497l.jpg" page="4" /><br />Coffee Samurai<br /><span class='textDark'>Special</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Trickster-Dub" title="Episode 012"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/9/81133.jpg" page="4" /><br />Trickster (Dub)<br /><span class='textDark'>Episode 012</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Touken-Ranbu-Hanamaru-Dub" title="Episode 012"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/6/83122.jpg" page="4" /><br />Touken Ranbu: Hanamaru (Dub)<br /><span class='textDark'>Episode 012</span></a>&nbsp;&nbsp;&nbsp;</div><div><a href="Anime/Naruto-Shippuuden-Dub" title="Episode 374 (LQ)"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/5/17407.jpg" page="5" /><br />Naruto Shippuuden (Dub)<br /><span class='textDark'>Episode 374 (LQ)</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/The-Racing-Brothers" title="Episode 019"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/7/26251.jpg" page="5" /><br />The Racing Brothers<br /><span class='textDark'>Episode 019</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/All-Out" title="Episode 015"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/4/78649.jpg" page="5" /><br />All Out!! (Sub)<br /><span class='textDark'>Episode 015</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Super-Lovers-2" title="Episode 012"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/1-19-2017/47093954583807l.jpg" page="5" /><br />Super Lovers 2<br /><span class='textDark'>Episode 012</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Marginal-4-Kiss-kara-Tsukuru-Big-Bang" title="Episode 002"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/1-19-2017/37189554583808l.jpg" page="5" /><br />Marginal#4: Kiss kara Tsukuru Big Bang<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;</div><div><a href="Anime/Masamune-kun-no-Revenge" title="Episode 003"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/1-20-2017/31884954580599l.jpg" page="6" /><br />Masamune-kun no Revenge<br /><span class='textDark'>Episode 003</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Naruto-Shippuuden" title="Episode 490"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/5/17407.jpg" page="6" /><br />Naruto Shippuuden (Sub)<br /><span class='textDark'>Episode 490</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Kuzu-no-Honkai" title="Episode 002"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/2/82926.jpg" page="6" /><br />Kuzu no Honkai<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Saiki-Kusuo-no-nan-TV-Dub" title="Episode 023"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/11/80167.jpg" page="6" /><br />Saiki Kusuo no Psi Nan (TV) (Dub)<br /><span class='textDark'>Episode 023</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/ReLIFE-Dub" title="Episode 013"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/3/82149.jpg" page="6" /><br />ReLIFE (Dub)<br /><span class='textDark'>Episode 013</span></a>&nbsp;&nbsp;&nbsp;</div><div><a href="Anime/Koro-sensei-Quest-Dub" title="Episode 002"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/10/83452.jpg" page="7" /><br />Koro-sensei Quest! (Dub)<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Hibike-Euphonium-2-Specials" title="Episode 002"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/13/83486.jpg" page="7" /><br />Hibike! Euphonium 2 Specials<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Wolf-Daddy" title="Movie"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/1-19-2017/22952654572704l.jpg" page="7" /><br />Wolf Daddy<br /><span class='textDark'>Movie</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Detective-Conan" title="Episode 846"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/7/75199.jpg" page="7" /><br />Detective Conan (Sub)<br /><span class='textDark'>Episode 846</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Onara-Gorou" title="Episode 009"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/2/79963.jpg" page="7" /><br />Onara Gorou<br /><span class='textDark'>Episode 009</span></a>&nbsp;&nbsp;&nbsp;</div><div><a href="Anime/Kono-Subarashii-Sekai-ni-Shukufuku-wo-2" title="Episode 002"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/2/83188.jpg" page="8" /><br />Kono Subarashii Sekai ni Shukufuku wo! 2<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Chaos-Child" title="Episode 002"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/1-19-2017/96970154583805l.jpg" page="8" /><br />Chaos;Child<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/One-Room" title="Episode 002"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/10/83250.jpg" page="8" /><br />One Room<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Kobayashi-san-Chi-no-Maid-Dragon" title="Episode 002"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/4/83173.jpg" page="8" /><br />Kobayashi-san Chi no Maid Dragon<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Piace-Watashi-no-Italian" title="Episode 002"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/8/83098.jpg" page="8" /><br />Piace: Watashi no Italian<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;</div><div><a href="Anime/Akiba-s-Trip-The-Animation" title="Episode 003"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/9/83185.jpg" page="9" /><br />Akiba's Trip The Animation (Sub)<br /><span class='textDark'>Episode 003</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Sousei-no-Onmyouji-Twin-Star-Exorcists" title="Episode 040"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/12/79556.jpg" page="9" /><br />Sousei no Onmyouji<br /><span class='textDark'>Episode 040</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Zekkyou-Gakkyuu-Tensei" title="Episode 002"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/1-17-2017/38116854579529.jpg" page="9" /><br />Zekkyou Gakkyuu: Tensei<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Watashi-ga-Motete-Dousunda-Dub" title="Episode 011"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/4/81953.jpg" page="9" /><br />Watashi ga Motete Dousunda (Dub)<br /><span class='textDark'>Episode 011</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Future-Card-Buddyfight-100-Sub" title="Episode 050"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/10/74881.jpg" page="9" /><br />Future Card Buddyfight 100 (Sub)<br /><span class='textDark'>Episode 050</span></a>&nbsp;&nbsp;&nbsp;</div><div><a href="Anime/Pokemon-XY-Z" title="Episode 048"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/12/54549.jpg" page="10" /><br />Pokemon XY&Z (Sub)<br /><span class='textDark'>Episode 048</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Nanbaka-Season-2" title="Episode 016"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/9/83263.jpg" page="10" /><br />Nanbaka: Season 2<br /><span class='textDark'>Episode 016</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Hand-Shakers" title="Episode 002"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/12-26-2016/8867554583395l.jpg" page="10" /><br />Hand Shakers<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/Kemono-Friends" title="Episode 002"><img width='130px' height='150px' srcTemp="https://myanimelist.cdn-dena.com/images/anime/2/83518.jpg" page="10" /><br />Kemono Friends<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;<a href="Anime/ACCA-13-ku-Kansatsu-ka" title="Episode 002"><img width='130px' height='150px' srcTemp="https://kissanime.ru/Uploads/Etc/1-17-2017/52082054583776.jpg" page="10" /><br />ACCA: 13-ku Kansatsu-ka<br /><span class='textDark'>Episode 002</span></a>&nbsp;&nbsp;&nbsp;</div>
                        </div>
                        <div class="clear">
                        </div>
                    </div>
                    <script type="text/javascript">
                        var _0x9038 = ["\x73\x63\x72\x6F\x6C\x6C\x61\x62\x6C\x65", "\x2E\x73\x63\x72\x6F\x6C\x6C\x61\x62\x6C\x65", "\x64\x61\x74\x61", "\x63\x6C\x69\x63\x6B", "\x2E\x70\x72\x65\x76", "\x6B\x65\x79\x43\x6F\x64\x65", "\x2E\x6E\x65\x78\x74", "\x6B\x65\x79\x64\x6F\x77\x6E", "\x50\x61\x67\x65\x20", "\x68\x74\x6D\x6C", "\x2E\x6E\x61\x76\x69", "\x68\x69\x64\x65", "\x67\x65\x74\x53\x69\x7A\x65", "\x2E\x69\x74\x65\x6D\x73\x20\x64\x69\x76\x20\x3E\x20\x61\x20\x69\x6D\x67\x5B\x70\x61\x67\x65\x3D", "\x5D", "\x73\x72\x63", "\x73\x72\x63\x54\x65\x6D\x70", "\x61\x74\x74\x72", "\x65\x61\x63\x68", "\x73\x69\x7A\x65", "\x2E\x69\x74\x65\x6D\x73\x20\x64\x69\x76\x20\x3E\x20\x61", "\x2F\x48\x6F\x6D\x65\x2F\x47\x65\x74\x4E\x65\x78\x74\x55\x70\x64\x61\x74\x65\x64\x41\x6E\x69\x6D\x65", "\x50\x4F\x53\x54", "\x73\x68\x6F\x77", "\x30", "\x63\x73\x73", "\x2E\x61\x6A\x78\x6C\x6F\x61\x64\x69\x6E\x67", "", "\x61\x64\x64\x49\x74\x65\x6D", "\x67\x65\x74\x49\x6E\x64\x65\x78", "\x6E\x65\x78\x74", "\x61\x6A\x61\x78"]; $(_0x9038[1])[_0x9038[0]](); var api = $(_0x9038[1])[_0x9038[2]](_0x9038[0]); $(_0x9038[4])[_0x9038[3]](function () { DoPrev(); }); function DoPrev() { if (scrollPage > 1) { scrollPage -= 1; SetScrollPage(); }; }; $(document)[_0x9038[7]](function (_0x63f6x3) { if (_0x63f6x3[_0x9038[5]] == 37) { DoPrev(); } else { if (_0x63f6x3[_0x9038[5]] == 39) { GoNext($(_0x9038[6])); }; }; }); $(_0x9038[6])[_0x9038[3]](function () { GoNext($(this)); }); var scrollPage = 1; function SetScrollPage() { $(_0x9038[10])[_0x9038[9]](_0x9038[8] + scrollPage); }; function GoNext(_0x63f6x7) { var _0x63f6x8 = _0x63f6x7; _0x63f6x8[_0x9038[11]](); if (scrollPage < api[_0x9038[12]]()) { scrollPage += 1; SetScrollPage(); }; var _0x63f6x9 = $(_0x9038[13] + (scrollPage + 1) + _0x9038[14]); _0x63f6x9[_0x9038[18]](function () { $(this)[_0x9038[17]](_0x9038[15], $(this)[_0x9038[17]](_0x9038[16])); }); if (api[_0x9038[12]]() == scrollPage) { var _0x63f6xa = $(_0x9038[20])[_0x9038[19]](); $[_0x9038[31]]({ url: _0x9038[21], type: _0x9038[22], dataType: _0x9038[9], data: { id: _0x63f6xa, page: scrollPage }, beforeSend: function () { $(_0x9038[26])[_0x9038[25]]({ "\x62\x6F\x74\x74\x6F\x6D": _0x9038[24] })[_0x9038[23]](); }, success: function (_0x63f6xb, _0x63f6xc) { if (_0x63f6xb != _0x9038[27]) { api[_0x9038[28]](_0x63f6xb); if (api[_0x9038[12]]() == api[_0x9038[29]]() + 1) { api[_0x9038[30]](); }; var _0x63f6x9 = $(_0x9038[13] + (scrollPage + 1) + _0x9038[14]); _0x63f6x9[_0x9038[18]](function () { $(this)[_0x9038[17]](_0x9038[15], $(this)[_0x9038[17]](_0x9038[16])); }); }; setTimeout(function () { _0x63f6x8[_0x9038[23]](); }, 2000); }, error: function (_0x63f6xd, _0x63f6xc, _0x63f6xe) { }, complete: function (_0x63f6xd, _0x63f6xc) { } }); } else { _0x63f6x8[_0x9038[23]](); }; };
                    </script>
                </div>
            </div>
            <div class="clear2">
            </div>
            <div id="submenu">
                <div id="tabmenucontainer">
                    <ul>
                        <li><a href="javascript:void(0);" id="liTrendingtab" title="Hot anime in this season"
                            class="tabactive" onclick="showTabData('trending')">New & Hot</a></li>
                        <li><a href="javascript:void(0);" id="liNewesttab" title="Recent additions" onclick="showTabData('newest')"
                            style="background-position: '0% -25px'">Recent additions</a></li>
                        <li><a href="javascript:void(0);" id="liMostViewtab" title="Most popular" onclick="showTabData('mostview')">
                            Most popular</a></li>
                    </ul>
                </div>
                <!-- end div tab menu container -->
                <div class="clear">
                </div>
                <div id="subcontent">
                    
                    <div id="tab-trending">
                        <div style='position:relative'><a href="Anime/Ao-no-Exorcist-Kyoto-Fujouou-hen"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/11/83418.jpg" /></a><a href="Anime/Ao-no-Exorcist-Kyoto-Fujouou-hen"><span class="title">Ao no Exorcist 2</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Demons" class="dotUnder" title="Anime that are set in a world where demons and other dark creatures play  a significant role - the main character may even be one.">Demons</a><span class="info">,</span> <a href="/Genre/Fantasy" class="dotUnder" title="Anime that are set in a mythical world quite different from modern-day  Earth. Frequently this world has magic and/or mythical creatures such as  dragons and unicorns. These stories are sometimes based on real world  legends and myths. Frequently fantasies describe tales featuring magic,  brave knights, damsels in distress, and/or quests.">Fantasy</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a><span class="info">,</span> <a href="/Genre/Supernatural" class="dotUnder" title="Anime of the paranormal stature. Demons, vampires, ghosts, undead, etc.">Supernatural</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Ao-no-Exorcist-Kyoto-Fujouou-hen/Episode-003?id=133790" title="Watch Ao no Exorcist 2 Episode 003 online">Episode 003</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/1.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Masamune-kun-no-Revenge"><img width="80px" height="100px" src="https://kissanime.ru/Uploads/Etc/1-20-2017/31884954580599l.jpg" /></a><a href="Anime/Masamune-kun-no-Revenge"><span class="title">Masamune-kun no Revenge</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/Harem" class="dotUnder" title="Anime that involves one lead male character and many cute/pretty female  support characters. Typically, the male lead ends up living with many  female support characters within the same household. The lead male  typically represents the average guy who is shy, awkward, and  girlfriendless. While each female character surround the lead male  possesses distinct physical and personality traits, those traits  nevertheless represent different stereotypical roles that play on  popular Japanese fetishes; i.e. the librarian/genius, tomboy, little  sister, and older woman. Some anime that are under the harem genre are:  Love Hina, Girls Bravo, Maburaho, and Sister Princess.">Harem</a><span class="info">,</span> <a href="/Genre/Romance" class="dotUnder" title="Anime whose story is about two people who each want [sometimes unconciously] to win or keep the love of the other. This kind of anime might also fall in the &#39;Ecchi&#39; category, while &#39;Romance&#39; and &#39;Hentai&#39; generally contradict each other.">Romance</a><span class="info">,</span> <a href="/Genre/School" class="dotUnder" title="Anime which are mainly set in a school environment.">School</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Masamune-kun-no-Revenge/Episode-003?id=133757" title="Watch Masamune-kun no Revenge Episode 003 online">Episode 003</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/2.png' /></div></div><div style='position:relative'><a href="Anime/Fuuka"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/manga/2/186209.jpg" /></a><a href="Anime/Fuuka"><span class="title">Fuuka</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Drama" class="dotUnder" title="Anime that often show life or characters through conflict and emotions.  In general, the different parts of the story tend to form a whole that  is greater than the sum of the parts. In other words, the story has a  message that is bigger than just the story line itself.">Drama</a><span class="info">,</span> <a href="/Genre/Ecchi" class="dotUnder" title="Anime that contain a lot of sexual innuendo. The translation of this  letter (Ecchi is the letter &#39;H&#39; in Japanese) is pervert. Ecchi is about  panties (pantsu) and bra/breast showing, situations with &#39;sudden nudity&#39; and of course, subtle hints or sexual thoughts. Ecchi does not describe  actual sex acts or show any intimate body parts except for bare breasts  and buttocks. Ecchi is almost always used for humor.">Ecchi</a><span class="info">,</span> <a href="/Genre/Music" class="dotUnder" title="Anime whose central theme revolves around singers/idols or people  playing instruments. This category is not intended for finding AMVs  (Animated Music Videos).">Music</a><span class="info">,</span> <a href="/Genre/Romance" class="dotUnder" title="Anime whose story is about two people who each want [sometimes unconciously] to win or keep the love of the other. This kind of anime might also fall in the &#39;Ecchi&#39; category, while &#39;Romance&#39; and &#39;Hentai&#39; generally contradict each other.">Romance</a><span class="info">,</span> <a href="/Genre/School" class="dotUnder" title="Anime which are mainly set in a school environment.">School</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Fuuka/Episode-004?id=133786" title="Watch Fuuka Episode 004 online">Episode 004</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/3.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Kono-Subarashii-Sekai-ni-Shukufuku-wo-2"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/2/83188.jpg" /></a><a href="Anime/Kono-Subarashii-Sekai-ni-Shukufuku-wo-2"><span class="title">Kono Subarashii Sekai ni Shukufuku wo! 2</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Adventure" class="dotUnder" title="Exploring new places, environments or situations. This is often  associated with people on long journeys to places far away encountering  amazing things, usually not in an epic but in a rather gripping and  interesting way.">Adventure</a><span class="info">,</span> <a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/Fantasy" class="dotUnder" title="Anime that are set in a mythical world quite different from modern-day  Earth. Frequently this world has magic and/or mythical creatures such as  dragons and unicorns. These stories are sometimes based on real world  legends and myths. Frequently fantasies describe tales featuring magic,  brave knights, damsels in distress, and/or quests.">Fantasy</a><span class="info">,</span> <a href="/Genre/Magic" class="dotUnder" title="Anime whose central theme revolves around magic. Things that are &#39;out of  this world&#39; happen - incidents that cannot be explained by the laws of  nature or science. Usually wizards/witches indicate that it is of the  &#39;Magic&#39; type. This is a sub-genre of fantasy.">Magic</a><span class="info">,</span> <a href="/Genre/Supernatural" class="dotUnder" title="Anime of the paranormal stature. Demons, vampires, ghosts, undead, etc.">Supernatural</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Kono-Subarashii-Sekai-ni-Shukufuku-wo-2/Episode-002?id=133744" title="Watch Kono Subarashii Sekai ni Shukufuku wo! 2 Episode 002 online">Episode 002</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/4.png' /></div></div><div style='position:relative'><a href="Anime/Youjo-Senki"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/manga/3/186468.jpg" /></a><a href="Anime/Youjo-Senki"><span class="title">Youjo Senki</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Magic" class="dotUnder" title="Anime whose central theme revolves around magic. Things that are &#39;out of  this world&#39; happen - incidents that cannot be explained by the laws of  nature or science. Usually wizards/witches indicate that it is of the  &#39;Magic&#39; type. This is a sub-genre of fantasy.">Magic</a><span class="info">,</span> <a href="/Genre/Military" class="dotUnder" title="An anime series/movie that has a heavy militaristic feel behind it.">Military</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Youjo-Senki/Episode-003?id=133785" title="Watch Youjo Senki Episode 003 online">Episode 003</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/5.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Hand-Shakers"><img width="80px" height="100px" src="https://kissanime.ru/Uploads/Etc/12-26-2016/8867554583395l.jpg" /></a><a href="Anime/Hand-Shakers"><span class="title">Hand Shakers</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Hand-Shakers/Episode-002?id=133712" title="Watch Hand Shakers Episode 002 online">Episode 002</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/6.png' /></div></div><div style='position:relative'><a href="Anime/Seiren"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/4/82969.jpg" /></a><a href="Anime/Seiren"><span class="title">Seiren</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/School" class="dotUnder" title="Anime which are mainly set in a school environment.">School</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Seiren/Episode-003?id=133765" title="Watch Seiren Episode 003 online">Episode 003</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/7.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Tales-of-Zestiria-the-X-2017"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/2/82039.jpg" /></a><a href="Anime/Tales-of-Zestiria-the-X-2017"><span class="title">Tales of Zestiria the X 2</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Adventure" class="dotUnder" title="Exploring new places, environments or situations. This is often  associated with people on long journeys to places far away encountering  amazing things, usually not in an epic but in a rather gripping and  interesting way.">Adventure</a><span class="info">,</span> <a href="/Genre/Fantasy" class="dotUnder" title="Anime that are set in a mythical world quite different from modern-day  Earth. Frequently this world has magic and/or mythical creatures such as  dragons and unicorns. These stories are sometimes based on real world  legends and myths. Frequently fantasies describe tales featuring magic,  brave knights, damsels in distress, and/or quests.">Fantasy</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Tales-of-Zestiria-the-X-2017/Episode-014?id=133633" title="Watch Tales of Zestiria the X 2 Episode 014 online">Episode 014</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/8.png' /></div></div><div style='position:relative'><a href="Anime/Spiritpact"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/9/83469.jpg" /></a><a href="Anime/Spiritpact"><span class="title">Spiritpact</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Shounen-Ai" class="dotUnder" title="Anime whose central theme is about a relationship (or strong affection, not usually sexual) between two boys or men. Shounen Ai literally means &#39;boy love&#39;, but could be expressed as &#39;male bonding&#39;.">Shounen Ai</a><span class="info">,</span> <a href="/Genre/Supernatural" class="dotUnder" title="Anime of the paranormal stature. Demons, vampires, ghosts, undead, etc.">Supernatural</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Spiritpact/Episode-002?id=133585" title="Watch Spiritpact Episode 002 online">Episode 002</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/9.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Akiba-s-Trip-The-Animation"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/9/83185.jpg" /></a><a href="Anime/Akiba-s-Trip-The-Animation"><span class="title">Akiba's Trip The Animation (Sub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Adventure" class="dotUnder" title="Exploring new places, environments or situations. This is often  associated with people on long journeys to places far away encountering  amazing things, usually not in an epic but in a rather gripping and  interesting way.">Adventure</a><span class="info">,</span> <a href="/Genre/Ecchi" class="dotUnder" title="Anime that contain a lot of sexual innuendo. The translation of this  letter (Ecchi is the letter &#39;H&#39; in Japanese) is pervert. Ecchi is about  panties (pantsu) and bra/breast showing, situations with &#39;sudden nudity&#39; and of course, subtle hints or sexual thoughts. Ecchi does not describe  actual sex acts or show any intimate body parts except for bare breasts  and buttocks. Ecchi is almost always used for humor.">Ecchi</a><span class="info">,</span> <a href="/Genre/Supernatural" class="dotUnder" title="Anime of the paranormal stature. Demons, vampires, ghosts, undead, etc.">Supernatural</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Akiba-s-Trip-The-Animation/Episode-003?id=133739" title="Watch Akiba&#39;s Trip The Animation (Sub) Episode 003 online">Episode 003</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/10.png' /></div></div>
                        <div style="text-align: right; font-size: 16px">
                            <a href="/AnimeList/NewAndHot">More...</a>
                        </div>
                    </div>
                    <div id="tab-newest" style="display: none">
                        <div style='position:relative'><a href="Anime/Coffee-Samurai"><img width="80px" height="100px" src="https://kissanime.ru/Uploads/Etc/1-20-2017/57073454535497l.jpg" /></a><a href="Anime/Coffee-Samurai"><span class="title">Coffee Samurai</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Romance" class="dotUnder" title="Anime whose story is about two people who each want [sometimes unconciously] to win or keep the love of the other. This kind of anime might also fall in the &#39;Ecchi&#39; category, while &#39;Romance&#39; and &#39;Hentai&#39; generally contradict each other.">Romance</a><span class="info">,</span> <a href="/Genre/Samurai" class="dotUnder" title="Anime whose main character(s) are samurai, the old, but not forgotten, warrior cast of medieval Japan.">Samurai</a><span class="info">,</span> <a href="/Genre/Sci-Fi" class="dotUnder" title="Anime where the setting is based on the technology and tools of a  scientifically imaginable world. The majority of technologies presented  are not available in the present day and therefore the Science is  Fiction. This incorporates any possible place (planets, space,  underwater, you name it).">Sci-Fi</a><span class="info">,</span> <a href="/Genre/Special" class="dotUnder" title="Special">Special</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Coffee-Samurai/Special?id=133782" title="Watch Coffee Samurai Special online">Special</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/1.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Wolf-Daddy"><img width="80px" height="100px" src="https://kissanime.ru/Uploads/Etc/1-19-2017/22952654572704l.jpg" /></a><a href="Anime/Wolf-Daddy"><span class="title">Wolf Daddy</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Fantasy" class="dotUnder" title="Anime that are set in a mythical world quite different from modern-day  Earth. Frequently this world has magic and/or mythical creatures such as  dragons and unicorns. These stories are sometimes based on real world  legends and myths. Frequently fantasies describe tales featuring magic,  brave knights, damsels in distress, and/or quests.">Fantasy</a><span class="info">,</span> <a href="/Genre/Movie" class="dotUnder" title="Movie">Movie</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Wolf-Daddy/Movie?id=133748" title="Watch Wolf Daddy Movie online">Movie</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/2.png' /></div></div><div style='position:relative'><a href="Anime/Zekkyou-Gakkyuu-Tensei"><img width="80px" height="100px" src="https://kissanime.ru/Uploads/Etc/1-17-2017/38116854579529.jpg" /></a><a href="Anime/Zekkyou-Gakkyuu-Tensei"><span class="title">Zekkyou Gakkyuu: Tensei</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Horror" class="dotUnder" title="Anime whose focus is to scare the audience.">Horror</a><span class="info">,</span> <a href="/Genre/Shoujo" class="dotUnder" title="Anime that are targeted towards the &#39;young girl&#39; market. Usually the story is from the point of view of a girl and deals with romance, drama or magic.">Shoujo</a><span class="info">,</span> <a href="/Genre/Special" class="dotUnder" title="Special">Special</a><span class="info">,</span> <a href="/Genre/Supernatural" class="dotUnder" title="Anime of the paranormal stature. Demons, vampires, ghosts, undead, etc.">Supernatural</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Zekkyou-Gakkyuu-Tensei/Episode-002?id=133737" title="Watch Zekkyou Gakkyuu: Tensei Episode 002 online">Episode 002</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/3.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Cross-Fight-B-Daman-Dub"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/2/32803.jpg" /></a><a href="Anime/Cross-Fight-B-Daman-Dub"><span class="title">Cross Fight B-Daman (Dub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Adventure" class="dotUnder" title="Exploring new places, environments or situations. This is often  associated with people on long journeys to places far away encountering  amazing things, usually not in an epic but in a rather gripping and  interesting way.">Adventure</a><span class="info">,</span> <a href="/Genre/Dub" class="dotUnder" title="English voices, no subtitle.">Dub</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Cross-Fight-B-Daman-Dub/Episode-026?id=133682" title="Watch Cross Fight B-Daman (Dub) Episode 026 online">Episode 026</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/4.png' /></div></div><div style='position:relative'><a href="Anime/Detatoko-Princess-Dub"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/10/62217.jpg" /></a><a href="Anime/Detatoko-Princess-Dub"><span class="title">Detatoko Princess (Dub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/Dub" class="dotUnder" title="English voices, no subtitle.">Dub</a><span class="info">,</span> <a href="/Genre/Fantasy" class="dotUnder" title="Anime that are set in a mythical world quite different from modern-day  Earth. Frequently this world has magic and/or mythical creatures such as  dragons and unicorns. These stories are sometimes based on real world  legends and myths. Frequently fantasies describe tales featuring magic,  brave knights, damsels in distress, and/or quests.">Fantasy</a><span class="info">,</span> <a href="/Genre/OVA" class="dotUnder" title="Original Animation Video &amp; Original Video Animation (OAV / OVA) are interchangeable terms used in Japan to refer to animation that is released directly to the video market without first going through a theatrical release or television broadcast.
Furthermore, OVA are&#160;supposed&#160;to have original scripts, although there are exceptions. They can be based on a Manga or TV series, but the particular episode should be original.">OVA</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Detatoko-Princess-Dub/Episode-003?id=133665" title="Watch Detatoko Princess (Dub) Episode 003 online">Episode 003</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/5.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Detatoko-Princess-Sub"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/10/62217.jpg" /></a><a href="Anime/Detatoko-Princess-Sub"><span class="title">Detatoko Princess (Sub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/Fantasy" class="dotUnder" title="Anime that are set in a mythical world quite different from modern-day  Earth. Frequently this world has magic and/or mythical creatures such as  dragons and unicorns. These stories are sometimes based on real world  legends and myths. Frequently fantasies describe tales featuring magic,  brave knights, damsels in distress, and/or quests.">Fantasy</a><span class="info">,</span> <a href="/Genre/OVA" class="dotUnder" title="Original Animation Video &amp; Original Video Animation (OAV / OVA) are interchangeable terms used in Japan to refer to animation that is released directly to the video market without first going through a theatrical release or television broadcast.
Furthermore, OVA are&#160;supposed&#160;to have original scripts, although there are exceptions. They can be based on a Manga or TV series, but the particular episode should be original.">OVA</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Detatoko-Princess-Sub/Episode-003?id=133662" title="Watch Detatoko Princess (Sub) Episode 003 online">Episode 003</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/6.png' /></div></div><div style='position:relative'><a href="Anime/Super-Danganronpa-2-5-Komaeda-Nagito-to-Sekai-no-Hakaimono"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/10/83150.jpg" /></a><a href="Anime/Super-Danganronpa-2-5-Komaeda-Nagito-to-Sekai-no-Hakaimono"><span class="title">Super Danganronpa 2.5: Komaeda Nagito to Sekai no Hakaimono</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Horror" class="dotUnder" title="Anime whose focus is to scare the audience.">Horror</a><span class="info">,</span> <a href="/Genre/Mystery" class="dotUnder" title="Anime where characters reveal secrets that may lead a solution for a  great mystery. This is not necessarily solving a crime, but can be a  realization after a quest.">Mystery</a><span class="info">,</span> <a href="/Genre/OVA" class="dotUnder" title="Original Animation Video &amp; Original Video Animation (OAV / OVA) are interchangeable terms used in Japan to refer to animation that is released directly to the video market without first going through a theatrical release or television broadcast.
Furthermore, OVA are&#160;supposed&#160;to have original scripts, although there are exceptions. They can be based on a Manga or TV series, but the particular episode should be original.">OVA</a><span class="info">,</span> <a href="/Genre/Psychological" class="dotUnder" title="Often when two or more characters prey each others&#39; minds, either by  playing deceptive games with the other or by merely trying to demolish  the other&#39;s mental state.">Psychological</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Super-Danganronpa-2-5-Komaeda-Nagito-to-Sekai-no-Hakaimono/Introduction-Video?id=133654" title="Watch Super Danganronpa 2.5: Komaeda Nagito to Sekai no Hakaimono _Introduction Video online">_Introduction Video</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/7.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Kanojo-ga-Kanji-wo-Suki-na-Riyuu"><img width="80px" height="100px" src="https://kissanime.ru/Uploads/Etc/1-16-2017/48178854576306l.jpg" /></a><a href="Anime/Kanojo-ga-Kanji-wo-Suki-na-Riyuu"><span class="title">Kanojo ga Kanji wo Suki na Riyuu.</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/ONA" class="dotUnder" title="ONA">ONA</a><span class="info">,</span> <a href="/Genre/School" class="dotUnder" title="Anime which are mainly set in a school environment.">School</a><span class="info">,</span> <a href="/Genre/Slice-of-Life" class="dotUnder" title="Anime with no clear central plot. This type of anime tends to be naturalistic and mainly focuses around the main characters and their everyday lives. Often there will be some philosophical perspectives regarding love, relationships, life etc. tied into the anime. The overall typical moods for this type of anime are cheery and carefree, in other words, it is your &#39;feel-good&#39; kind of anime. Some anime that are under the slice of life genre are: Ichigo Mashimaro, Fruits Basket, Aria the Natural, Honey and Clover, and Piano.">Slice of Life</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Kanojo-ga-Kanji-wo-Suki-na-Riyuu/Episode?id=133652" title="Watch Kanojo ga Kanji wo Suki na Riyuu. Episode 001 online">Episode 001</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/8.png' /></div></div><div style='position:relative'><a href="Anime/Closers-Side-Blacklambs"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/11/78304.jpg" /></a><a href="Anime/Closers-Side-Blacklambs"><span class="title">Closers: Side Blacklambs</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Fantasy" class="dotUnder" title="Anime that are set in a mythical world quite different from modern-day  Earth. Frequently this world has magic and/or mythical creatures such as  dragons and unicorns. These stories are sometimes based on real world  legends and myths. Frequently fantasies describe tales featuring magic,  brave knights, damsels in distress, and/or quests.">Fantasy</a><span class="info">,</span> <a href="/Genre/Game" class="dotUnder" title="Anime whose central theme is based on a non-violent, non-sports game,  like go, chess, trading card games or computer/video games.">Game</a><span class="info">,</span> <a href="/Genre/ONA" class="dotUnder" title="ONA">ONA</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Closers-Side-Blacklambs/Episode-001-CamVersion?id=133602" title="Watch Closers: Side Blacklambs Episode 001 (CamVersion) online">Episode 001 (CamVersion)</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/9.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Early-English-with-Doraemon"><img width="80px" height="100px" src="https://kissanime.ru/Uploads/Etc/1-13-2017/489978545eedoraemon02.jpg" /></a><a href="Anime/Early-English-with-Doraemon"><span class="title">Early English with Doraemon</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Kids" class="dotUnder" title="Anime whose target audience is children. This does not necessarily mean  that the character(s) are children or that an anime whose main  character(s) are children is appropriate for this genre.">Kids</a><span class="info">,</span> <a href="/Genre/OVA" class="dotUnder" title="Original Animation Video &amp; Original Video Animation (OAV / OVA) are interchangeable terms used in Japan to refer to animation that is released directly to the video market without first going through a theatrical release or television broadcast.
Furthermore, OVA are&#160;supposed&#160;to have original scripts, although there are exceptions. They can be based on a Manga or TV series, but the particular episode should be original.">OVA</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Early-English-with-Doraemon/Episode-001?id=133570" title="Watch Early English with Doraemon Episode 001 online">Episode 001</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/10.png' /></div></div>
                        <div style="text-align: right; font-size: 16px">
                            <a href="/AnimeList/Newest">More...</a>
                        </div>
                    </div>
                    <div id="tab-mostview" style="display: none">
                        <div style='position:relative'><a href="Anime/One-Piece"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/6/73245.jpg" /></a><a href="Anime/One-Piece"><span class="title">One Piece (Sub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Adventure" class="dotUnder" title="Exploring new places, environments or situations. This is often  associated with people on long journeys to places far away encountering  amazing things, usually not in an epic but in a rather gripping and  interesting way.">Adventure</a><span class="info">,</span> <a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/Drama" class="dotUnder" title="Anime that often show life or characters through conflict and emotions.  In general, the different parts of the story tend to form a whole that  is greater than the sum of the parts. In other words, the story has a  message that is bigger than just the story line itself.">Drama</a><span class="info">,</span> <a href="/Genre/Fantasy" class="dotUnder" title="Anime that are set in a mythical world quite different from modern-day  Earth. Frequently this world has magic and/or mythical creatures such as  dragons and unicorns. These stories are sometimes based on real world  legends and myths. Frequently fantasies describe tales featuring magic,  brave knights, damsels in distress, and/or quests.">Fantasy</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a><span class="info">,</span> <a href="/Genre/Super-Power" class="dotUnder" title="Anime whose main character(s) have powers beyond normal humans. Often it  looks like magic, but can&#39;t really be considered magic; usually  ki-attacks, flying or superhuman strength.">Super Power</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/One-Piece/Episode-772?id=133606" title="Watch One Piece (Sub) Episode 772 online">Episode 772</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/1.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Re-Zero-kara-Hajimeru-Isekai-Seikatsu"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/11/79410.jpg" /></a><a href="Anime/Re-Zero-kara-Hajimeru-Isekai-Seikatsu"><span class="title">Re:Zero kara Hajimeru Isekai Seikatsu</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Drama" class="dotUnder" title="Anime that often show life or characters through conflict and emotions.  In general, the different parts of the story tend to form a whole that  is greater than the sum of the parts. In other words, the story has a  message that is bigger than just the story line itself.">Drama</a><span class="info">,</span> <a href="/Genre/Fantasy" class="dotUnder" title="Anime that are set in a mythical world quite different from modern-day  Earth. Frequently this world has magic and/or mythical creatures such as  dragons and unicorns. These stories are sometimes based on real world  legends and myths. Frequently fantasies describe tales featuring magic,  brave knights, damsels in distress, and/or quests.">Fantasy</a><span class="info">,</span> <a href="/Genre/Psychological" class="dotUnder" title="Often when two or more characters prey each others&#39; minds, either by  playing deceptive games with the other or by merely trying to demolish  the other&#39;s mental state.">Psychological</a><span class="info">,</span> <a href="/Genre/Thriller" class="dotUnder" title="Thriller">Thriller</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Re-Zero-kara-Hajimeru-Isekai-Seikatsu/Episode-025?id=130099" title="Watch Re:Zero kara Hajimeru Isekai Seikatsu Episode 025 online">Episode 025</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/2.png' /></div></div><div style='position:relative'><a href="Anime/Dragon-Ball-Super"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/7/74606.jpg" /></a><a href="Anime/Dragon-Ball-Super"><span class="title">Dragon Ball Super (Sub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Adventure" class="dotUnder" title="Exploring new places, environments or situations. This is often  associated with people on long journeys to places far away encountering  amazing things, usually not in an epic but in a rather gripping and  interesting way.">Adventure</a><span class="info">,</span> <a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/Martial-Arts" class="dotUnder" title="Anime whose central theme revolves around martial arts. This includes  all hand-to-hand fighting styles, including Karate, Tae-Kwon-Do and even  Boxing. Weapons use, like Nunchaku and Shuriken are also indications of  this genre. This is a sub-genre of action.">Martial Arts</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a><span class="info">,</span> <a href="/Genre/Super-Power" class="dotUnder" title="Anime whose main character(s) have powers beyond normal humans. Often it  looks like magic, but can&#39;t really be considered magic; usually  ki-attacks, flying or superhuman strength.">Super Power</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Dragon-Ball-Super/Episode-074?id=133605" title="Watch Dragon Ball Super (Sub) Episode 074 online">Episode 074</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/3.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/One-Punch-Man"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/12/76049.jpg" /></a><a href="Anime/One-Punch-Man"><span class="title">One Punch Man (Sub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/Parody" class="dotUnder" title="Anime that imitate other stories (can be from TV, film, books,  historical events, ...) for comic effect by exaggerating the style and  changing the content of the original. Also known as spoofs. This is a  sub-genre of comedy.">Parody</a><span class="info">,</span> <a href="/Genre/Sci-Fi" class="dotUnder" title="Anime where the setting is based on the technology and tools of a  scientifically imaginable world. The majority of technologies presented  are not available in the present day and therefore the Science is  Fiction. This incorporates any possible place (planets, space,  underwater, you name it).">Sci-Fi</a><span class="info">,</span> <a href="/Genre/Seinen" class="dotUnder" title="Seinen">Seinen</a><span class="info">,</span> <a href="/Genre/Super-Power" class="dotUnder" title="Anime whose main character(s) have powers beyond normal humans. Often it  looks like magic, but can&#39;t really be considered magic; usually  ki-attacks, flying or superhuman strength.">Super Power</a><span class="info">,</span> <a href="/Genre/Supernatural" class="dotUnder" title="Anime of the paranormal stature. Demons, vampires, ghosts, undead, etc.">Supernatural</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/One-Punch-Man/Episode-012?id=121194" title="Watch One Punch Man (Sub) Episode 012 online">Episode 012</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/4.png' /></div></div><div style='position:relative'><a href="Anime/Naruto-Shippuuden"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/5/17407.jpg" /></a><a href="Anime/Naruto-Shippuuden"><span class="title">Naruto Shippuuden (Sub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/Martial-Arts" class="dotUnder" title="Anime whose central theme revolves around martial arts. This includes  all hand-to-hand fighting styles, including Karate, Tae-Kwon-Do and even  Boxing. Weapons use, like Nunchaku and Shuriken are also indications of  this genre. This is a sub-genre of action.">Martial Arts</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a><span class="info">,</span> <a href="/Genre/Super-Power" class="dotUnder" title="Anime whose main character(s) have powers beyond normal humans. Often it  looks like magic, but can&#39;t really be considered magic; usually  ki-attacks, flying or superhuman strength.">Super Power</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Naruto-Shippuuden/Episode-490?id=133756" title="Watch Naruto Shippuuden (Sub) Episode 490 online">Episode 490</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/5.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Naruto-Shippuuden-Dub"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/5/17407.jpg" /></a><a href="Anime/Naruto-Shippuuden-Dub"><span class="title">Naruto Shippuuden (Dub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/Dub" class="dotUnder" title="English voices, no subtitle.">Dub</a><span class="info">,</span> <a href="/Genre/Martial-Arts" class="dotUnder" title="Anime whose central theme revolves around martial arts. This includes  all hand-to-hand fighting styles, including Karate, Tae-Kwon-Do and even  Boxing. Weapons use, like Nunchaku and Shuriken are also indications of  this genre. This is a sub-genre of action.">Martial Arts</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a><span class="info">,</span> <a href="/Genre/Super-Power" class="dotUnder" title="Anime whose main character(s) have powers beyond normal humans. Often it  looks like magic, but can&#39;t really be considered magic; usually  ki-attacks, flying or superhuman strength.">Super Power</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Naruto-Shippuuden-Dub/Episode-374?id=133779" title="Watch Naruto Shippuuden (Dub) Episode 374 (LQ) online">Episode 374 (LQ)</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/6.png' /></div></div><div style='position:relative'><a href="Anime/Boku-no-Hero-Academia-My-Hero-Academia"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/10/78745.jpg" /></a><a href="Anime/Boku-no-Hero-Academia-My-Hero-Academia"><span class="title">Boku no Hero Academia (Sub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Comedy" class="dotUnder" title="Multiple characters and/or events causing hilarious results. These  stories are built upon funny characters, situations and events.">Comedy</a><span class="info">,</span> <a href="/Genre/School" class="dotUnder" title="Anime which are mainly set in a school environment.">School</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a><span class="info">,</span> <a href="/Genre/Super-Power" class="dotUnder" title="Anime whose main character(s) have powers beyond normal humans. Often it  looks like magic, but can&#39;t really be considered magic; usually  ki-attacks, flying or superhuman strength.">Super Power</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Boku-no-Hero-Academia-My-Hero-Academia/Episode-013?id=127035" title="Watch Boku no Hero Academia (Sub) Episode 013 online">Episode 013</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/7.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Shokugeki-no-Souma-Ni-no-Sara"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/3/72943.jpg" /></a><a href="Anime/Shokugeki-no-Souma-Ni-no-Sara"><span class="title">Shokugeki no Soma S2</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Ecchi" class="dotUnder" title="Anime that contain a lot of sexual innuendo. The translation of this  letter (Ecchi is the letter &#39;H&#39; in Japanese) is pervert. Ecchi is about  panties (pantsu) and bra/breast showing, situations with &#39;sudden nudity&#39; and of course, subtle hints or sexual thoughts. Ecchi does not describe  actual sex acts or show any intimate body parts except for bare breasts  and buttocks. Ecchi is almost always used for humor.">Ecchi</a><span class="info">,</span> <a href="/Genre/School" class="dotUnder" title="Anime which are mainly set in a school environment.">School</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Shokugeki-no-Souma-Ni-no-Sara/Episode-013?id=130386" title="Watch Shokugeki no Soma S2 Episode 013 online">Episode 013</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/8.png' /></div></div><div style='position:relative'><a href="Anime/Sousei-no-Onmyouji-Twin-Star-Exorcists"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/12/79556.jpg" /></a><a href="Anime/Sousei-no-Onmyouji-Twin-Star-Exorcists"><span class="title">Sousei no Onmyouji</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Fantasy" class="dotUnder" title="Anime that are set in a mythical world quite different from modern-day  Earth. Frequently this world has magic and/or mythical creatures such as  dragons and unicorns. These stories are sometimes based on real world  legends and myths. Frequently fantasies describe tales featuring magic,  brave knights, damsels in distress, and/or quests.">Fantasy</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a><span class="info">,</span> <a href="/Genre/Supernatural" class="dotUnder" title="Anime of the paranormal stature. Demons, vampires, ghosts, undead, etc.">Supernatural</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Sousei-no-Onmyouji-Twin-Star-Exorcists/Episode-040?id=133738" title="Watch Sousei no Onmyouji Episode 040 online">Episode 040</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px'><img src='../../Content/images/numbers/9.png' /></div></div><div style='position:relative' class='blue'><a href="Anime/Hunter-x-Hunter-2011"><img width="80px" height="100px" src="https://myanimelist.cdn-dena.com/images/anime/11/33657.jpg" /></a><a href="Anime/Hunter-x-Hunter-2011"><span class="title">Hunter x Hunter (2011) (Sub)</span></a><p><span class="info">Genres:</span>&nbsp;<a href="/Genre/Action" class="dotUnder" title="Plays out mainly through a clash of physical forces. Frequently these  stories have fast cuts, tough characters making quick decisions and  usually a beautiful girl nearby. Anything quick and most likely a thin  storyline.">Action</a><span class="info">,</span> <a href="/Genre/Adventure" class="dotUnder" title="Exploring new places, environments or situations. This is often  associated with people on long journeys to places far away encountering  amazing things, usually not in an epic but in a rather gripping and  interesting way.">Adventure</a><span class="info">,</span> <a href="/Genre/Shounen" class="dotUnder" title="In the context of manga and associated media, the word shounen refers to a male audience roughly between the ages of 10 and 18. In Japanese, the word means simply &#39;young male&#39;, and has no anime/manga-related connotations at all. It does not comprise a style or a genre per se, but rather indicates the publisher`s intended target demographic. Still, while not mandatory, some easily identifiable traits are generally common to shounen works, such as: high-action, often humorous plots featuring male protagonists; camaraderie between male friends; sports teams and fighting squads (usually coupled with the aforementioned camaraderie); unrealistically attractive female characters (see fanservice). Additionally, the art style of shounen tends to be less flowery than that of shoujo and the plots tend to be less complex than seinen, but neither of those is a requirement.
Anime that are targeted towards the &#39;young boy&#39; market. The usual topics for this involve fighting, friendship and sometimes super powers.">Shounen</a><span class="info">,</span> <a href="/Genre/Super-Power" class="dotUnder" title="Anime whose main character(s) have powers beyond normal humans. Often it  looks like magic, but can&#39;t really be considered magic; usually  ki-attacks, flying or superhuman strength.">Super Power</a></p><p><span class="info">Latest:</span>&nbsp;<a href="/Anime/Hunter-x-Hunter-2011/Episode-148?id=115888" title="Watch Hunter x Hunter (2011) (Sub) Episode 148 online">Episode 148</a></p><div style='position:absolute;top:0px; left:680px; width:28px; height:28px; background-color:#161616'><img src='../../Content/images/numbers/10.png' /></div></div>
                        <div style="text-align: right; font-size: 16px">
                            <a href="/AnimeList/MostPopular">More...</a>
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </div>
                <!-- end div subcontent -->
            </div>
            <!-- end div submenu -->
            <div class="clear2">
            </div>
            
<div style="text-align: center; padding: 10px 0px 10px 0px;">
    <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms" id="adsIfrme1" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"
        src="/ads/madads300.aspx" width="300px" height="250px">
    </iframe>
</div>

<script type="text/javascript">

    function AddCloseButton(id) {
        var elem = $('#' + id);
        if (elem.position() != null) {
            var top = elem.position().top + elem.height();
            var left = elem.position().left + elem.width() - 24;
            elem.after('<div class="divCloseBut" style="position:absolute; left:' + left + 'px; top: ' + top + 'px"><a href="#" onclick="$(\'#' + id + '\').remove();$(this).remove(); InitCloseButton(); return false;">Hide</a></div>');
        }
    }

    function InitCloseButton() {
        $('.divCloseBut').remove();
        AddCloseButton('adsIfrme1');
    }
    InitCloseButton();

</script>


        </div>
        <!-- end div leftside -->
        <div id="rightside">
            <div class="rightBox">
                <div class="barTitle">
                    Ongoing series</div>
                <div class="barContent">
                    <div class="arrow-general">
                        &nbsp;</div>
                    
                    <div style="margin-top: -10px">
                        <img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch online ClassicaLoid Episode 015 high quality" href="/Anime/ClassicaLoid/Episode-015?id=133799">ClassicaLoid Episode 015</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch online Seiren Episode 003 high quality" href="/Anime/Seiren/Episode-003?id=133765">Seiren Episode 003</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch online Future Card Buddyfight DDD Episode 042 high quality" href="/Anime/Future-Card-Buddyfight-DDD/Episode-042?id=133798">Future Card Buddyfight DDD Episode 042</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch online Kaitou Joker 2nd Season (Dub) Episode 018 high quality" href="/Anime/Kaitou-Joker-2nd-Season-Dub/Episode-018?id=133797">Kaitou Joker 2nd Season (Dub) Episode 018</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch online Pokemon Sun and Moon (Sub) Episode 011 high quality" href="/Anime/Pokemon-Sun-Moon/Episode-011?id=133796">Pokemon Sun and Moon (Sub) Episode 011</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch online Koro-sensei Quest! (Sub) Episode 005 high quality" href="/Anime/Koro-sensei-Q/Episode-005?id=133762">Koro-sensei Quest! (Sub) Episode 005</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch online Bonobono (2016) Episode 041 high quality" href="/Anime/Bonobono-2016/Episode-041?id=133795">Bonobono (2016) Episode 041</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch online Shouwa Genroku Rakugo Shinjuu 2 Episode 003 high quality" href="/Anime/Shouwa-Genroku-Rakugo-Shinjuu-Sukeroku-Futatabi-hen/Episode-003?id=133791">Shouwa Genroku Rakugo Shinjuu 2 Episode 003</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch online Kamisama Minarai: Himitsu no Cocotama Episode 057 high quality" href="/Anime/Kamisama-Minarai-Himitsu-no-Cocotama/Episode-057?id=133793">Kamisama Minarai: Himitsu no Cocotama Episode 057</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch online Ao no Exorcist 2 Episode 003 high quality" href="/Anime/Ao-no-Exorcist-Kyoto-Fujouou-hen/Episode-003?id=133790">Ao no Exorcist 2 Episode 003</a><div class="clear" style="height:5px"></div>
                    </div>
                    <div style="text-align: right; font-size: 14px; padding-top: 5px">
                        <a href="/Status/Ongoing/LatestUpdate">More...</a>
                    </div>
                </div>
            </div>
            <div class="clear2">
            </div>
            <div>
                
<div style="text-align: center">
    <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms" id="adsIfrme3" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"
        src="/ads/madads160.aspx" width="160px" height="600px">
    </iframe>
</div>

<script type="text/javascript">

        function AddCloseButton(id) {
            var elem = $('#' + id);
            if (elem.position() != null) {
                var top = elem.position().top + elem.height();
                var left = elem.position().left + elem.width() - 24;
                elem.after('<div class="divCloseBut" style="position:absolute; left:' + left + 'px; top: ' + top + 'px"><a href="#" onclick="$(\'#' + id + '\').remove();$(this).remove(); InitCloseButton(); return false;">Hide</a></div>');
            }
        }

        function InitCloseButton() {
            $('.divCloseBut').remove();
            AddCloseButton('adsIfrme1');
			AddCloseButton('adsIfrme3');
        }
        InitCloseButton();

</script>

            </div>
            <div class="clear2">
            </div>
            <div class="rightBox">
                <div class="barTitle">
                    Like me please ^^</div>
                <div class="barContent">
                    <div class="arrow-general">
                        &nbsp;</div>
                    <div>
                        Please help us by liking, sharing and commenting. Thanks!
                        <div class="clear2">
                        </div>
                        <iframe src="https://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fkissanimefp%2F&amp;width=193&amp;colorscheme=dark&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=195"
                            scrolling="no" frameborder="0" style="border: none; overflow: hidden; width: 195px;
                            height: 197px;" allowtransparency="true"></iframe>
                        
                    </div>
                </div>
            </div>
            <div class="clear2">
            </div>
            <div class="rightBox">
                <div class="barTitle">
                    Latest update</div>
                <div class="barContent">
                    <div class="arrow-general">
                        &nbsp;</div>
                    <div>
                        <img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime ClassicaLoid online in high quality" href="Anime/ClassicaLoid">ClassicaLoid</a> <a class="textDark" title="Watch ClassicaLoid Episode 015 online in high quality" href="/Anime/ClassicaLoid/Episode-015?id=133799">Episode 015</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Seiren online in high quality" href="Anime/Seiren">Seiren</a> <a class="textDark" title="Watch Seiren Episode 003 online in high quality" href="/Anime/Seiren/Episode-003?id=133765">Episode 003</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Future Card Buddyfight DDD online in high quality" href="Anime/Future-Card-Buddyfight-DDD">Future Card Buddyfight DDD</a> <a class="textDark" title="Watch Future Card Buddyfight DDD Episode 042 online in high quality" href="/Anime/Future-Card-Buddyfight-DDD/Episode-042?id=133798">Episode 042</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Kaitou Joker 2nd Season (Dub) online in high quality" href="Anime/Kaitou-Joker-2nd-Season-Dub">Kaitou Joker 2nd Season (Dub)</a> <a class="textDark" title="Watch Kaitou Joker 2nd Season (Dub) Episode 018 online in high quality" href="/Anime/Kaitou-Joker-2nd-Season-Dub/Episode-018?id=133797">Episode 018</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Pokemon Sun and Moon (Sub) online in high quality" href="Anime/Pokemon-Sun-Moon">Pokemon Sun and Moon (Sub)</a> <a class="textDark" title="Watch Pokemon Sun and Moon (Sub) Episode 011 online in high quality" href="/Anime/Pokemon-Sun-Moon/Episode-011?id=133796">Episode 011</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Koro-sensei Quest! (Sub) online in high quality" href="Anime/Koro-sensei-Q">Koro-sensei Quest! (Sub)</a> <a class="textDark" title="Watch Koro-sensei Quest! (Sub) Episode 005 online in high quality" href="/Anime/Koro-sensei-Q/Episode-005?id=133762">Episode 005</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Bonobono (2016) online in high quality" href="Anime/Bonobono-2016">Bonobono (2016)</a> <a class="textDark" title="Watch Bonobono (2016) Episode 041 online in high quality" href="/Anime/Bonobono-2016/Episode-041?id=133795">Episode 041</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Shouwa Genroku Rakugo Shinjuu 2 online in high quality" href="Anime/Shouwa-Genroku-Rakugo-Shinjuu-Sukeroku-Futatabi-hen">Shouwa Genroku Rakugo Shinjuu 2</a> <a class="textDark" title="Watch Shouwa Genroku Rakugo Shinjuu 2 Episode 003 online in high quality" href="/Anime/Shouwa-Genroku-Rakugo-Shinjuu-Sukeroku-Futatabi-hen/Episode-003?id=133791">Episode 003</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Kamisama Minarai: Himitsu no Cocotama online in high quality" href="Anime/Kamisama-Minarai-Himitsu-no-Cocotama">Kamisama Minarai: Himitsu no Cocotama</a> <a class="textDark" title="Watch Kamisama Minarai: Himitsu no Cocotama Episode 057 online in high quality" href="/Anime/Kamisama-Minarai-Himitsu-no-Cocotama/Episode-057?id=133793">Episode 057</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Ao no Exorcist 2 online in high quality" href="Anime/Ao-no-Exorcist-Kyoto-Fujouou-hen">Ao no Exorcist 2</a> <a class="textDark" title="Watch Ao no Exorcist 2 Episode 003 online in high quality" href="/Anime/Ao-no-Exorcist-Kyoto-Fujouou-hen/Episode-003?id=133790">Episode 003</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Schoolgirl Strikers: Animation Channel online in high quality" href="Anime/Schoolgirl-Strikers-Animation-Channel">Schoolgirl Strikers: Animation Channel</a> <a class="textDark" title="Watch Schoolgirl Strikers: Animation Channel Episode 003 online in high quality" href="/Anime/Schoolgirl-Strikers-Animation-Channel/Episode-003?id=133788">Episode 003</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Minami Kamakura Koukou Joshi Jitensha-bu online in high quality" href="Anime/Minami-Kamakura-Koukou-Joshi-Jitensha-bu">Minami Kamakura Koukou Joshi Jitensha-bu</a> <a class="textDark" title="Watch Minami Kamakura Koukou Joshi Jitensha-bu Episode 003 online in high quality" href="/Anime/Minami-Kamakura-Koukou-Joshi-Jitensha-bu/Episode-003?id=133787">Episode 003</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Mori no Yousei: Kinoko no Musume online in high quality" href="Anime/Mori-no-Yousei-Kinoko-no-Musume">Mori no Yousei: Kinoko no Musume</a> <a class="textDark" title="Watch Mori no Yousei: Kinoko no Musume Episode 003 online in high quality" href="/Anime/Mori-no-Yousei-Kinoko-no-Musume/Episode-003?id=133789">Episode 003</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Fuuka online in high quality" href="Anime/Fuuka">Fuuka</a> <a class="textDark" title="Watch Fuuka Episode 004 online in high quality" href="/Anime/Fuuka/Episode-004?id=133786">Episode 004</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Youjo Senki online in high quality" href="Anime/Youjo-Senki">Youjo Senki</a> <a class="textDark" title="Watch Youjo Senki Episode 003 online in high quality" href="/Anime/Youjo-Senki/Episode-003?id=133785">Episode 003</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Urara Meirochou online in high quality" href="Anime/Urara-Meirochou">Urara Meirochou</a> <a class="textDark" title="Watch Urara Meirochou Episode 003 online in high quality" href="/Anime/Urara-Meirochou/Episode-003?id=133784">Episode 003</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Show By Rock!! 2nd Season (Dub) online in high quality" href="Anime/Show-By-Rock-2nd-Season-Dub">Show By Rock!! 2nd Season (Dub)</a> <a class="textDark" title="Watch Show By Rock!! 2nd Season (Dub) Episode 012 online in high quality" href="/Anime/Show-By-Rock-2nd-Season-Dub/Episode-012?id=133783">Episode 012</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Coffee Samurai online in high quality" href="Anime/Coffee-Samurai">Coffee Samurai</a> <a class="textDark" title="Watch Coffee Samurai Special online in high quality" href="/Anime/Coffee-Samurai/Special?id=133782">Special</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Trickster (Dub) online in high quality" href="Anime/Trickster-Dub">Trickster (Dub)</a> <a class="textDark" title="Watch Trickster (Dub) Episode 012 online in high quality" href="/Anime/Trickster-Dub/Episode-012?id=133781">Episode 012</a><div class="clear" style="height:5px"></div><img src="../../Content/images/bullet.png" />&nbsp;<a title="Watch anime Touken Ranbu: Hanamaru (Dub) online in high quality" href="Anime/Touken-Ranbu-Hanamaru-Dub">Touken Ranbu: Hanamaru (Dub)</a> <a class="textDark" title="Watch Touken Ranbu: Hanamaru (Dub) Episode 012 online in high quality" href="/Anime/Touken-Ranbu-Hanamaru-Dub/Episode-012?id=133780">Episode 012</a><div class="clear" style="height:5px"></div>
                        <div style="text-align: right; font-size: 14px; padding-top: 5px">
                            <a href="/AnimeList/LatestUpdate">More...</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <script type="text/javascript">
                $('#aCommentHide').click(function () {
                    $('#divCommentHide').show();
                    $(this).hide();
                });
            </script>
        </div>
        <div class="clear">
        </div>
    </div>

        <!-- end div container -->
        <div class="clear">
            &nbsp;</div>
        <div class="clear">
            &nbsp;</div>
        <div class="clear">
            &nbsp;</div>
        
<div style="z-index: 0; position: absolute; top: 220px; left: 0px; width: 100%; height: 600px;
    overflow: hidden; visibility: hidden">
    <div id="divFloatLeft" style="position: absolute; visibility: visible; left: -2000px">
        <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" src="/ads/madads160-2.aspx"
            width="160px" height="600px"></iframe>
    </div>
    <div id="divFloatRight" style="position: absolute; visibility: visible; right: -2000px">
        <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" src="/ads/madads160-3.aspx"
            width="160px" height="600px"></iframe>
    </div>
</div>
<script type="text/javascript">
    function DoAdsPosition() {
        var browserWidth = $(window).width();
        var webWidth = 1000;
        var bannerWidth = 160;
        var blankWidth = (browserWidth - webWidth) / 2;
        var margin = 15;

        $('#divFloatLeft').css('left', browserWidth - webWidth - blankWidth - bannerWidth - margin);
        $('#divFloatLeft').show();

        $('#divFloatRight').css('right', browserWidth - webWidth - blankWidth - bannerWidth - margin);
        $('#divFloatRight').show();
    }

    DoAdsPosition();
    $(window).resize(function () {
        DoAdsPosition();
    });
</script>
        
    </div>
    
    <div id="footer">
        <div id="footcontainer" style="position: relative">
            <p>
                <a href="/">KissAnime.ru</a>. Copyrights and trademarks for the anime, and other promotional materials are held by their respective owners and their use is allowed under the fair use clause of the Copyright Law. 

<a href="/Message/PrivacyPolicy">Privacy Policy</a>&nbsp;|&nbsp;<a href="/Message/ReportError">Contact us</a>&nbsp;|&nbsp;<a href="http://kisscartoon.se/">Watch cartoons online</a>&nbsp;&nbsp;</p>               
        </div>
    </div>
    <script type="text/javascript">
        $('#footer').css('top', $(document).height() - $('#containerRoot').height());
    </script>
</body>
</html>


EOT;

	}

	public function testPatternConstruction_1()
	{
		$this->instance->where("attribute", "href")
			 		   ->where("tag", "hr");

		var_dump($this->instance->constructPattern());
	}
	
	public function testPatternConstruction_2()
	{
		$this->instance
			 ->where("tag","a")
			 ->where("attribute","href","http://kissanime.ru/Anime/Ao-no-Exorcist-Kyoto-Fujouou-hen");
			 		   
		var_dump($this->instance->constructPattern());
	}



	public function testResults()
	{
		$r = $this->instance
		     ->select()
		     ->source($this->haystack)
			 ->where("tag","a")
			 ->where("attribute","href","Anime/Ao-no-Exorcist-Kyoto-Fujouou-hen")
			 ->fetch();

		var_dump($r);
	}

}
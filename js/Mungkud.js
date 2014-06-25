/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var DisablePH = false;
if (DisablePH)
    var pubCovertop = ['401730.jpg', '400992.jpg', '401916.jpg', '392537.jpg']; // โฆษณาข้าง Youtube
else
    var pubCovertop = ['Publish.png', 'Publish.png', 'Publish.png', 'Publish.png']; // โฆษณาข้าง Youtube
//
//var listcat = ['หนังใหม่ (Zoom)', 'หนังใหม่ (Master)', 'หนังไทย', 'การ์ตูน'];
var listcat = ['หนังใหม่อัพเดต'];




// Init List Menu
$(function() {

    for (var i = 0; i < listcat.length; i++)
        $('#listmovies').append('<label>' + listcat[i] + '</label><div id="Category_' + i + '"></div>');
    for (var i = 0; i < moviefirstPage.length; i++) {
        $('#listmovies>div').append('<div><img width="150" height="200" src="images/movieF/' + moviefirstPage[i].url + '" /><p>' + moviefirstPage[i].name + '</p></div>');
    }


});


/*
 * 
 * 
 *          Cover Banner
 *          
 *          
 */


// Init Cover Youtubr Banner
$(function() {

    var text = '<iframe width="853" height="480" src="//www.youtube.com/embed/HoUN6oFc7lU?rel=0" frameborder="0" allowfullscreen></iframe>';
    $('#coveryoutube').find('iframe').replaceWith($(text));
    // โฆษณา
    if (DisablePH) {
        $('<img id="phCover01" src="images/banner/' + pubCovertop[0] + '" />').css({
            'width': '200px',
            'height': '240px',
            'position': 'absolute',
            'top': '140px'
        }).appendTo($('#coveryoutube'));
        $('<img id="phCover02" src="images/banner/' + pubCovertop[1] + '" />').css({
            'width': '200px',
            'height': '240px',
            'position': 'absolute',
            'top': '380px'
        }).appendTo($('#coveryoutube'));
        $('<img id="phCover03" src="images/banner/' + pubCovertop[2] + '" />').css({
            'width': '200px',
            'height': '240px',
            'position': 'absolute',
            'top': '140px',
            'right': '0px'
        }).appendTo($('#coveryoutube'));
        $('<img id="phCover04" src="images/banner/' + pubCovertop[3] + '" />').css({
            'width': '200px',
            'height': '240px',
            'position': 'absolute',
            'top': '380px',
            'right': '0px'
        }).appendTo($('#coveryoutube'));
    }
});

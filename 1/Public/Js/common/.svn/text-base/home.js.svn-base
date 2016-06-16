var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        effect: 'cube',
        grabCursor: true,
        autoplay:3000,
        autoplayDisableOnInteraction : false,
        speed:1300,
        paginationClickable: true,
        grabCursor : true,
        parallax:true,
        loop: true,
        cube: {
            shadow: true,
            slideShadows: true,
            shadowOffset: 20,
            shadowScale: 0.94
        }
    });

/**
 * @description 鼠标划过，图片放大，缩小
 * @param  {[int]} h1 [原图高]
 * @param  {[int]} w1 [原图宽]
 * @param  {[int]} h2 [大图高]
 * @param  {[int]} w2 [大图宽]
 * @return 
 */
// function hover_max(h1,w1,h2,w2,class_img){
//     $("."+class_img).hover(function(){
//         var pic_top = parseInt((h1-h2)/2);
//         var pic_left = parseInt((w1-w2)/2);
//         $(this).stop().animate({
//            height    : h2+"px",
//            width     : w2+"px",
//            marginTop : pic_top+"px",
//            marginLeft: pic_left+"px"
//         });
//     },function(){
//         $(this).stop().animate({
//            height    : h1+"px",
//            width     : w1+"px",
//            marginTop : "0px",
//            marginLeft: "0px"
//         });
//     });
// }
// 
// 文章顶级评论
function articleComment(url,content){
    var name     = $('#username').val();
    var email    = $('#email').val();
    // var content  = $('#content').val();
    var arid     = $('#arid').val();

    $.ajax({
        url     : url,
        type    : 'post',
        data    : {
            'name'    : name,
            'email'   : email,
            'content' : content,
            'arid'    : arid
        },
        success : function(data){
            if(data != 0){
                var string = '<div class="row article-comment"><div class="col-sm-1"><img class="article-comment-img" src="'+data.head_pic+'"></div><div class="col-sm-11"><div class="article-comment-name"><strong>'+data.name+'</strong><span class="comment-response" onclick="response('+data.cid+')" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-commenting-o">&nbsp;回复</i></span></div><div class="article-comment-time">'+data.time+'</div><div class="article-comment-content"><p>'+data.content+'</p></div></div></div><hr id="son'+data.cid+'" class="article-comment-hr">';
                $('#article-comment').prepend(string);
                $('#collapseExample').removeClass('in');
            }
        } 
    });
}

// 文章评论回复
function articleResponse(url){
    var name     = $('#sname').val();
    var email    = $('#semail').val();
    var content  = $('#scontent').val();
    var arid     = $('#arid').val();
    var pcid     = $('#pcid').val();

    $.ajax({
        url     : url,
        type    : 'post',
        data    : {
            'name'    : name,
            'email'   : email,
            'content' : content,
            'arid'    : arid,
            'pcid'    : pcid
        },
        success : function(data){
            if(data != 0){
                var string = '<div id="son'+data.cid+'"><div class="row article-comment-son"><div class="col-sm-1"><img class="article-comment-img" src="'+data.head_pic+'"></div><div class="col-sm-11"><div class="article-comment-name"><strong>'+data.name+'</strong><span class="comment-response" onclick="response('+data.cid+')" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-commenting-o">&nbsp;回复</i></span></div><div class="article-comment-time">'+data.time+'</div><div class="article-comment-content"><p><strong>@'+data.parent+'</strong>'+data.content+'</p></div></div></div><hr class="article-comment-hr-son"></div>';
                $('#son'+data.pcid).after(string);
            }
        } 
    });
}
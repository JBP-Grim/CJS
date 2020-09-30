
$(document).ready(function(){  
    $(".sendMail").hide();

    var folder = "./Img/reel/";
    $.ajax({
        url : folder,
        success: function (data) {
            a = 0
            $(data).find("a").attr("href", function (i, val) {
                if(val.match(/\.(jpe?g|png)$/) ) {
                    listAppend = `<li data-target="#carouselServices" data-slide-to="${a}"  class="inactive`
                    if(a == 0){
                        listAppend += ` active`
                    }
                    listAppend += `"></li>`
                    $("#carouselServicesList").append(listAppend);
                    imgAppend = `<div class="carousel-item`
                    if(a === 0){
                        imgAppend += ` active`
                    }
                    imgAppend += `">
                                    <img class="d-block w-100" src="${folder}${val}" alt="${val}" style="width:auto; height: 600px; object-fit: scale-down">
                                </div>`
                    $("#carouselServicesInner").append(imgAppend);
                    a++;
                }
                else if(val.match(/\.(mp4)$/)){
                    console.log("LSADDASDAsd")
                }
            });
        }
    });  
});

$(".bubleMail").click(function(){
    toggleIcons();
});

$(".closeButton").click(function(){
    toggleIcons();
});

function toggleIcons(){
    $(".sendMail").animate({width: 'toggle'});
    $(".bubleSection").animate({width: 'toggle'});
}
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {
        nextStepWizard();
    });
    $(".prev-step").click(function (e) {
        prevStepWizard();
    });
});

function nextStepWizard(){
    var $active = $('.wizard .nav-tabs li.active');
    $active.removeClass('active')
    $active.attr("disabled", "disabled");
    $active.next().removeAttr('disabled');
    $active.next().addClass('active');
    //$active.next().removeClass('disabled');
    nextTab($active);
}

function prevStepWizard(){
    var $active = $('.wizard .nav-tabs li.active');
    $active.removeClass('active')
    $active.attr("disabled", "disabled");
    $active.prev().removeAttr('disabled');
    $active.prev().addClass('active');
    prevTab($active);
}

function nextTab(elem) {
    var sizebar = $(elem).next().data("barsize");
    $("#progressbar").width(sizebar);
    var tab = $(elem).next().find('a[data-toggle="tab"]');
    //console.log($(elem).find('a[data-toggle="tab"]').attr("href"))
    //console.log($(tab).attr("href"))
    var idCurrentElement = $(elem).find('a[data-toggle="tab"]').attr("href");
    var idNextElement = $(tab).attr("href");
    $(idCurrentElement).addClass('u-shadow-v1-5 g-line-height-2 animated bounceOutLeft g-pa-40')
    $(idNextElement).addClass('animate-move').addClass('animated bounceInRight')

    setTimeout(()=>{
        tab.removeClass('disabled')
        tab.click();
        $('html,body').animate({scrollTop: 360},'slow');
        tab.addClass('disabled')
        $(idCurrentElement).removeClass('u-shadow-v1-5 g-line-height-2 animated bounceOutLeft g-pa-40')
        setTimeout(()=>{$(idNextElement).addClass('animate-move').removeClass('animated bounceInRight g-pa-40')},1000);
    },1000);
}
function prevTab(elem) {
    var sizebar = $(elem).prev().data("barsize");
    $("#progressbar").width(sizebar);
    var tab = $(elem).prev().find('a[data-toggle="tab"]');
    
    var idCurrentElement = $(elem).find('a[data-toggle="tab"]').attr("href");
    var idPrevElement = $(tab).attr("href");

    $(idCurrentElement).addClass('u-shadow-v1-5 g-line-height-2 animated bounceOutRight g-pa-40')
    $(idPrevElement).addClass('animate-move').addClass('animated bounceInLeft')

    setTimeout(()=>{
        tab.removeClass('disabled')
        tab.click();
        $('html,body').animate({scrollTop: 360},'slow');
        tab.addClass('disabled')
        $(idCurrentElement).removeClass('u-shadow-v1-5 g-line-height-2 animated bounceOutRight g-pa-40')
        setTimeout(()=>{$(idPrevElement).addClass('animate-move').removeClass('animated bounceInRight g-pa-40')},1000);
    },1000);
}
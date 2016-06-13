var p = 0;	
function autoChange(){
	p++;
    if(p>=$('#focus-image>li').length){
	    p=0;
    }
    //console.log(p);
    $('#focus-number>li').trigger('click');
}

$(function(){
	for( var i=1; i<= $('#focus-image>li').length; i++){
		$('#focus-number').append('<li>' + i +'</li>');
	}
	$('#focus-number>li').eq(0).addClass('current');

	var imgWidth = $('#focus-content').width();
	$('#focus-number>li').css('width','20px');
	var tigWidth = $('#focus-number>li').width();
	$('#focus-number').css('left', Math.round( (imgWidth - tigWidth*i - (i-1)*5)/2) + 'px');

	$('#focus-number>li').click(function(){
		$('#focus-image>li').eq(p).siblings().fadeOut('fast','linear',function(){
		    $('#focus-image>li').eq(p).fadeIn('fast','linear');
	    })
		$('#focus-number>li').eq(p).addClass('current').siblings().removeClass('current');
	})

	$('#focus-number>li').mouseover(function(){
		var n = $(this).text() - 1;
		$('#focus-image>li').eq(n).siblings().fadeOut('normal','linear',function(){
		    $('#focus-image>li').eq(n).fadeIn('normal','linear');
	    })
		$('#focus-number>li').eq(n).addClass('current').siblings().removeClass('current');
	})		
})

window.setInterval('autoChange()',3000);
	   
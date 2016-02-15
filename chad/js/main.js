jQuery(function($){
	
	/*------------------Instantiating FastClick----------------------*/
    FastClick.attach(document.body);
	
	var contactWidth = $('.contact-wrap').width();
	$('.contact-wrap').css('height', contactWidth);
	$('#page-wrap').hide();

	/*-----------------Working around height on tablet---------------*/
	var postArray = [];
	$('.post').each(function(){
		postArray.push($(this));
	});

	var windowHeight = 0;
	$.each(postArray, function(){
		var postHeight = $(this).height();
		windowHeight += postHeight;
	});

	var both = $('#right, #experience-page');

	/*--------------- Handle window resize --------

	$(window).on('resize load', function(){
		var socialWidth = $('.sn-wrap li').width();
		$('.sn-wrap li').css('height', socialWidth + 25);
		var newWindowWidth = $(window).width();
		var icons = $('.sn-wrap li i');

		if(newWindowWidth < 1800 && newWindowWidth > 1500){
			icons.removeClass('fa-5x fa-3x').addClass('fa-4x');		
			$('.active-cover').slideDown();
		}else if(newWindowWidth < 1500 && newWindowWidth > 990){
			$('#mobile-navigation').slideUp();
			icons.removeClass('fa-4x fa-5x').addClass('fa-3x');
		}else if(newWindowWidth > 1800){
			icons.removeClass('fa-4x fa-3x').addClass('fa-5x');
			$('.post-cover').slideUp();
		}else if(newWindowWidth < 981 && newWindowWidth > 767){
			$('#mobile-navigation').css('display','none');
			$('#sticky button span').removeClass().addClass('glyphicon glyphicon-align-right');
			icons.removeClass('fa-4x fa-3x').addClass('fa-5x');
	//		both.css('height', windowHeight / 2);
		}else if(newWindowWidth < 724 && newWindowWidth > 520){	
			icons.removeClass('fa-5x fa-3x').addClass('fa-4x');		
		}else if(newWindowWidth < 520){
			icons.removeClass('fa-4x fa-3x').addClass('fa-5x');		
		}
	});

	-----------*/

	var skillWrapHeight = $('.skill-wrap').height();
	$('#skill-content-wrap').css('height',skillWrapHeight);

	$('#skill-content-wrap').on('resize load', function(){
		var skillWrapHeight = $('.skil-wrap').height();
		$('#skill-content-wrap').css('height',skillWrapHeight);
	});


	/*--------Make slider and title fly in from left----------*/
	$('#name-wrap').animate({left: 0}, 1000);
	$('.wpb-slider-caption').animate({right: 1}, 1000);

	/*-------------------- Post Pages ------------------------*/

	$('.post').click(function(e){
		if($(window).width() > 1800){
			$('.post').css('opacity', '0.3');
		}
		$(this).css('opacity', '1');
		$('.content-wrap').empty();
		var content = $(this).next('.post-content');
		var html = $(content).html();
		var visibleHtml = $(html).addClass('visible');
		$('.content-wrap').append(visibleHtml);

		var itemsNotClicked = $(this).siblings('visible');

		if(window.width > 1800){
			itemsNotClicked.css('opacity', '.4')
		}
	});

	/*--------------Animate box shadow of wrapper---------------*/
	
	$('.wrapper').bind('scroll', function() {
		$('.wrapper').removeClass('high-shadow low-shadow');
		if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight){
			$('.wrapper').addClass('high-shadow');
		}else if($(this).scrollTop() + $(this).innerHeight() <= $(this)[0].scrollHeight){
			$('.wrapper').addClass('low-shadow');
		}
	});

	/*-------------------Make text appear over posts------------------*/

	$('.skill-image').click(function(e){
		$('.active-cover').removeClass('active-cover');
		$(this).next().addClass('active-cover');
		if($(window).width() < 1800){
			$('.post-cover').slideUp();
			$(this).next().slideDown();
		}
	});

	/*-----------------Mobile navigation dropdown---------------------*/
	$('.btn-default').click(function(){
		if($('#mobile-navigation').hasClass('dropped')){
			$('#mobile-navigation').fadeOut().removeClass('dropped');
			$('#sticky button span').removeClass().addClass('glyphicon glyphicon-align-right');
		}else{
			$('#mobile-navigation').addClass('dropped').slideDown();
			$('#sticky button span').removeClass().addClass('glyphicon glyphicon-remove');
		}
	});

	/*----------------Toggle resume dropdown--------------------------*/
	$('#resume').click(function(){
		if($('#toggle-arrow').hasClass('active-arrow')){
			$('#resume-wrap').slideDown();
			$('#toggle-arrow').removeClass('glyphicon glyphicon-chevron-up active-arrow').addClass('glyphicon glyphicon-chevron-down');
		}else{
			$('#resume-wrap').slideUp();
			$('#toggle-arrow').removeClass('glyphicon glyphicon-chevron-down').addClass('glyphicon glyphicon-chevron-up active-arrow');

		}
		
	});

	/*-------------------Interest sort buttons-----------------------*/
	//Initially
	$('#by-prof,#by-environ').addClass('success');
	$('.personal-post, .webdev-post').addClass('outtasight');
	//On click
	var buttons = $("#by-prof, #by-pers, #by-environ, #by-webdev").on("click", function(e) {

		//restore opactiy
		$('.post').css('opacity', '0.8');

		//and reset content wrap
		var origHtml = "<div class='welcome-wrap'>";
			origHtml +=		"<h1 id='welcome'>Click To Begin!</h1>";
			origHtml +=		"<i class='fa fa-hand-o-left fa-5x'></i>";
			origHtml +="</div>";

		$('#dummy-content-wrap').empty().append(origHtml);

   		if(!$(this).hasClass('success')){
            buttons.toggleClass('success');
    	}

    	if($("#by-prof, #by-environ").hasClass('success')){
			$(".professional-post").removeClass('outtasight').addClass('visible').hide().fadeIn();
			$(".environmental-post").removeClass('outtasight').addClass('visible').hide().fadeIn();
		} else{
			$(".professional-post").addClass('outtasight').removeClass('visible').hide();
			$(".environmental-post").addClass('outtasight').removeClass('visible').hide();
		} 

		if($("#by-pers, #by-webdev").hasClass('success')){
			$(".personal-post").removeClass('outtasight').addClass('visible').hide().fadeIn();
			$(".webdev-post").removeClass('outtasight').addClass('visible').hide().fadeIn();

		}else{
			$(".personal-post").addClass('outtasight').removeClass('visible').hide();
			$(".webdev-post").addClass('outtasight').removeClass('visible').hide();
		}
	});

	//Hide and show navigation bar
		$('.fa-angle-left').click(function(){
			$('#left').animate({
				left: "-=300",
			}, 300);
			$('#name-wrap').animate({
				top: "-=300",
			}, 300);
			$('#show-nav-btn').removeClass('out-of-sight');
		});
		$('.fa-angle-right').click(function(){
			$('#left').animate({
				left: "+=300",
			}, 300);
			$('#name-wrap').animate({
				top: "+=300",
			}, 300);
			$('#show-nav-btn').addClass('out-of-sight');
		});


});


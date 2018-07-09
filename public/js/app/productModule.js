var productModule = (function() {

	// private

	var owlProductColors,
	owlProductGallery,
	owlFullImgGallery = $('.img-zoom'),
	preventTrigger = false,
	owlChanged = true,
	dragged = false, 
	dir
	;

	var moveCrosshairTo = function($img) {
		$('.product-gallery-crosshair').remove();
		var crosshair = ('<div class="product-gallery-crosshair"></div>');
		var $imgClones = findClones($img);
		$imgClones.prepend($(crosshair));
	}

	var slideCarouselBy = function (i) {
		if (i > 0) {
			var check = function(){
				if(i < 2) {
					clearInterval(timer);
				}
				i--;
				var gallery = owlProductGallery;
				if ($('.slider-product-mini-gallery.fake-carousel').length > 0) {
					gallery = owlFullImgGallery;
				}
				gallery.trigger('next.owl.carousel');
			};

			if(i > 0)
				var timer = setInterval(check, 150); 
		}
	}

	var findClones = function($img) {
		var id = $img.data("id");
		clones = $();
		$('.owl-productGallery').find('.owl-item').each(function() {
			if ($(this).find('.owl-productGallery-thumb-crop').data("id") === id)
				clones = clones.add($(this));
		})
		return clones;
	}

	function openGalleryModal (event) {	

		var width = $(window).width(),
		height = $(window).height(),
		start = 0,
		modalUrl = null;

		if(width >= 768) {
			width -= 246;                   
		} else {
			width = height = Math.max(width, height);
		}

		if ($(this).hasClass('openGalleryModal')) {
			modalUrl = $(this).data("modalUrl");
		} else {
			if (owlFullImgGallery.find('.owl-item.active video').length > 0) {
				return;
			}
			modalUrl = $('.img-zoom').data("modalUrl");
			owl_item = $('.img-zoom .owl-item.active .product-full-img-crop');
			if (owl_item.size()) {
				start = $('.img-zoom .owl-item.active .product-full-img-crop').data('index');
			}
		}

		if (modalUrl.indexOf('?') !== -1) {
			modalUrl = modalUrl + '&w=' + width + '&h=' + height + '&s=' + start;
		} else {
			modalUrl = modalUrl + '?w=' + width + '&h=' + height + '&s=' + start;
		}

		event.preventDefault();
		$('#pgwModal').remove();
		$.pgwModal({			                
			url: modalUrl,
			mainClassName: 'pgwModal fullsize',
			maxWidth: '100%',
			titleBar: false,
			loadingContent: '' 
		});
	}
	function initGalleryModal () {	
		$('.img-zoom:not(.bound-openGalleryModal)').addClass('bound-openGalleryModal').on('click', openGalleryModal);
		$('.openGalleryModal:not(.bound-openGalleryModal)').addClass('bound-openGalleryModal').on('click',openGalleryModal);
	}

	function initFullImgGallery() {

		var owlItems = $('.product-full-img-crop').length;

		$('.img-zoom').on('initialized.owl.carousel', function (event) {
			var h = $('.img-zoom').height();
			$('.img-zoom').height(h);
		});

		var owlOptions = {
			items: 1,
			loop: owlItems > 1,
			slideBy: 1,
			margin: 0,
			nav: false,
			dots: false,
			mouseDrag: owlItems > 1,
			navSpeed: 100,
			lazyLoad: true,
			autoWidth: false,
			responsive: false,
			touchDrag: owlItems > 1
		}

		if ($('.slider-product-mini-gallery.fake-carousel').length > 0) {
			owlOptions.autoplay = true;
		}

		owlFullImgGallery = $('.img-zoom').owlCarousel(owlOptions);

		owlFullImgGallery.on('dragged.owl.carousel', function (event) {
			dragged = true;
			dir = event.relatedTarget.state.direction == "right";
		})

		owlFullImgGallery.on('change.owl.carousel', function (e) {

			if (dragged) {
				if (dir) {
					$next = $('.owl-productGallery').find('.owl-item.active').eq(0).prev().find('.owl-productGallery-thumb-crop')
					owlProductGallery.trigger('prev.owl.carousel');
					$nextFullImg = $('.img-zoom .owl-item.active').prev()
				} else {
					$next = $('.owl-productGallery').find('.owl-item.active').eq(1).find('.owl-productGallery-thumb-crop')
					owlProductGallery.trigger('next.owl.carousel');
					$nextFullImg = $('.img-zoom .owl-item.active').next()
				}
				setZoomArrows($nextFullImg)
				setImgDivHeight($nextFullImg)
				moveCrosshairTo($next);
				if (!permaStop) owlStop(true);	
				preventTrigger = true;
			}
			dragged = false;
		})			
		if ($('.slider-product-mini-gallery.fake-carousel').length > 0) {
			owlFullImgGallery.on('changed.owl.carousel', function (event) {
				var index = event.item.index - 1;
				var productsLength = $('.owl-productGallery').find('.owl-stage').children().length
				if (index > productsLength - 1) {
					index -= productsLength
				}
				$img = $('.slider-product-mini-gallery.fake-carousel').find('.owl-stage').children().eq(index).find('.owl-productGallery-thumb-crop')
				moveCrosshairTo($img);

				//PORTA LOGO
				setTimeout(
					function() 
					{
						portaLogo();
					}, 100);
			})
		}
		owlFullImgGallery.on('translated.owl.carousel', function (e) {
			owlChanged = true;
			setZoomArrows()
			setImgDivHeight()
		})
	}

	function initProductGallery() {

		var owlItems = $('.product-full-img-crop').length;

		owlProductGallery = $('.owl-productGallery').owlCarousel({
			items: 4,
			loop: owlItems > 1,
			slideBy: 1,
			margin: 1,
			nav: false,
			dots: false,
			mouseDrag: false,
			navSpeed: 100,
			lazyLoad: true,
			autoWidth: false,
			responsive: false,
			autoplay: owlItems > 1,
			touchDrag: owlItems > 1
		});

		initFullImgGallery();

		owlProductGallery.on('change.owl.carousel', function (e) {
			if (!e.namespace || e.property.name != 'position') return

				var carousel = e.relatedTarget

			before = carousel.relative(carousel.normalize(carousel.current(), false))
			after = carousel.relative(carousel.normalize(e.property.value, false))
			change = true
		})		

		owlProductGallery.on('changed.owl.carousel', function (event) {
			//4 = ilość active itemów
			owlFullImgGallery.trigger("to.owl.carousel", [event.item.index - 4, 250, true]);

			//PORTA LOGO
			setTimeout(
				function() 
				{
					portaLogo();
				}, 100);
			
		})
		owlProductGallery.on('translate.owl.carousel', function (event) {
			if (!preventTrigger) {

				if (before === 0 && after === event.item.count - 1) {
				    // its going from the first slide to the last slide (backwards)
				    var direction = true;
				} else if (after > before || (before === (event.item.count - 1) && after === 0 )) {
				    // its either going normally forwards or going from the last slide to the first
				    var direction = false;
				} else {
					var direction = true;
				}

				if (direction) {
					$next = $('.owl-productGallery').find('.owl-item.active').eq(0).prev().find('.owl-productGallery-thumb-crop')
					$nextFullImg = $('.img-zoom .owl-item.active').prev()
					owlFullImgGallery.trigger('prev.owl.carousel');
				} else {
					$next = $('.owl-productGallery').find('.owl-item.active').eq(1).find('.owl-productGallery-thumb-crop')
					$nextFullImg = $('.img-zoom .owl-item.active').next()
					owlFullImgGallery.trigger('next.owl.carousel');
					
				}
				// setZoomArrows($nextFullImg)
				// setImgDivHeight($nextFullImg)
				moveCrosshairTo($next);	
				dragged = false;
			}
			preventTrigger = false;
		})

		$('#produkt-gallery-wrapper').on('mouseleave', _.debounce(owlPlay, 1500))
		$('#produkt-gallery-wrapper').on('mouseenter', owlStop)	

		$('#produkt-gallery-wrapper').on('mouseenter', _.debounce(switchTempStop, 2500))	
		$('#produkt-gallery-wrapper').one('mouseover', owlStop)	
		$('#produkt-gallery-wrapper').one('mouseover', _.debounce(switchTempStop, 2500))	
		$(window).on("load",function () {
			$('.img-zoom .owl-item').on('mouseenter', function (e) {
				if ($(window).width() > 1024 && !$(this).find('.product-full-img-crop.video-js').length > 0 && $(this).find('div[data-zoom-img]').size() > 0 ) {
					$(this).find('.product-full-img-crop').hide();
				}
			})
			$('.img-zoom .owl-item').on('mouseleave', function (e) {
				if ($(window).width() > 1024  && !$(this).find('.product-full-img-crop.video-js').length > 0 && $(this).find('div[data-zoom-img]').size() > 0 ) {
					$(this).find('.product-full-img-crop').show();
				}
			})  
		})

		$('.full-img-video').on('click touchend', function () {
			owlStop(true);
		})

		$('.img-zoom').css("width", ($(window).width()));


	}
	var tempStop = false;
	var permaStop = false;

	// PORTA LOGO
	function portaLogo(){
		if($('.active').find('.zoom-container').length > 0){
			$('.ev-porta-logo-big-resp').css({'visibility':'hidden'});
			$('.ev-porta-logo-small-resp').css({'visibility':'hidden'});
		}else{
			$('.ev-porta-logo-big-resp').css({'visibility':'visible'});
			$('.ev-porta-logo-small-resp').css({'visibility':'visible'});
		}
	}

	// PORTA LOGO

	function owlPlay() {

		if (!permaStop) {
			var check = function(){
				clearInterval(timer);
				if(!tempStop) {
			    	// console.log('play')
			    	owlProductGallery.trigger('play.owl.autoplay', 5000);
			    	if ($('.slider-product-mini-gallery.fake-carousel').length > 0) {
			    		owlFullImgGallery.trigger('play.owl.autoplay', 5000);
			    	}
			    	
			    }

			    
			};
			var timer = setInterval(check, 1000); 
		}
	}

	function owlStop(perma) {
    	// console.log('stop')
    	owlProductGallery.trigger('stop.owl.autoplay');
    	if ($('.slider-product-mini-gallery.fake-carousel').length > 0) {
    		owlFullImgGallery.trigger('stop.owl.autoplay');
    	}
    	tempStop = true;
    	if (typeof perma == 'boolean' && perma) {
    		permaStop = true;
    	}
    }
    function switchTempStop () {
    	tempStop = false;
    }

    function initColorGallery() {
    	owlProductColors = $('.owl-productColors').owlCarousel({
    		items: 4,
    		loop: false,
    		slideBy: 1,
    		margin: 0,
    		nav: true,
    		dots: false,
    		mouseDrag: false,
    		navSpeed: 100,
    		lazyLoad: false,
    		autoWidth: true,
    		responsive: false
    	});
    	$('.owl-productColors').each(function(){
    		var _items = $(this).find('.item');
    		if (_items.size()<=4) {
    			$(this).find('.owl-nav').hide();
    		}
    	});
    }	

    function initZoom() {
    	if ($(window).width() > 1024) {
    		$('.zoom-container').each(function() {
    			var $this = $(this);
    			$this
    			.zoom({
    				url: $this.data("zoomImg"),
    				magnify: 1.0
    			})
    		})
    	}

    	var width = $(window).width();

    	function resize() {
    		if ($(window).width() !== width) {
    			width = $(window).width();
    			if (typeof owlFullImgGallery != 'undefined') {
    				owlFullImgGallery.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
    				owlFullImgGallery.find('.owl-stage-outer').children().unwrap();
    				owlFullImgGallery.removeAttr("style");
    				initFullImgGallery();
    				index = owlProductGallery.find('.owl-item.active').find('.owl-productGallery-thumb-crop').data("index")
    				if (index != 0) {
    					owlChanged = false;
    					owlFullImgGallery.trigger("to.owl.carousel", [index, 250, true]);
    				}
    			}
    			setFullImgHeight();

    			if (width > 1024) {
    				setZoomArrows();
    			}
    			if (width < 769) {
    				$('.img-zoom').css("width", width);
    			}
    		}

    		initializeSlickCarousel();
    	};
    	$(window).on('resize', _.debounce(resize, 350))
    }
    function setFullImgHeight() {
    	width = $(window).width();
    	if (width < 1024 && width > 767) {
    		var nameHeight = $('#produkt-gallery-wrapper .product-name-wrapper').height()
    		var fullHeight = $('#produkt-gallery-wrapper').height()
    		$('.img-zoom').css({height: fullHeight - nameHeight + "px", "margin-top": nameHeight + "px"})
    	}
    }

    function setImgDivHeight($nextItem) {
		// if (width <=768) {
		// 	var check = function(){
		// 	    if(owlChanged) {
		// 	    	clearInterval(timer);
		// 			if (!($nextItem instanceof jQuery)) {
		// 				$nextItem = $('.img-zoom .owl-item.active')
		// 			}
		// 			var fullHeight = $nextItem.find('.product-full-img-crop').height()
		// 			$('.img-zoom').height(fullHeight)
		// 			return;
		// 	    }
		// 	};
		// 	var timer = setInterval(check, 100); 

		// }
	}

	function thumbOnClick() {

		$('.owl-productGallery-thumb-crop').on('click', function() {
			$this = $(this);
			var selectedIndex = $this.closest('.owl-item').index();
			var currentIndex = $(".owl-productGallery").find('.active').index()
			var i = selectedIndex - currentIndex;
			if (i == 0) {
					//for fake carousel:
					var currentIndex = $(".owl-productGallery").find('.product-gallery-crosshair').parent().index();
					i = selectedIndex - currentIndex;
					if (i < 0) {
						i += $this.closest('.owl-item').siblings().length + 1
					}
				}
				if (i !== 0) {	
					moveCrosshairTo($this);
					slideCarouselBy(i);
					owlStop(true);
				}
			})
	}

	function initSelectPicker() {
		var _is_mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);

		var _selectpickers = $(".selectpicker:not('.bound-selectpicker')");
		if (_selectpickers.length) {
			_selectpickers.each(function() {
				$(this).addClass('bound-selectpicker');
				$(this).selectpicker();
				if (_is_mobile) {
					$(this).selectpicker('mobile');
				}
			});
		}

		var _controls = $("input:not('.bound-controls'), select:not('.bound-controls'), textarea:not('.bound-controls')");
		_controls.each(function() {
			$(this).addClass('bound-controls');
			$(this).on('focus blur', function(event) {
				$('meta[name=viewport]').attr('content', 'width=device-width,initial-scale=1,maximum-scale=' + (event.type == 'blur' ? 10 : 1));
			});
		});
	}

	function initSpinner() {

		var updateAttached = function(thisSpinner) {
			var _input = thisSpinner.children("input");
			if (_input.is('[data-attached]')) {
				$('#'+_input.attr('data-attached')).val(thisSpinner.children("input").val());
			}
			thisSpinner.trigger('spinchange');
		};

		var _spiners = $(".spinner:not('.bound-spinner')");
		_spiners.each(function() {
			var _this = $(this);
			var _input = _this.find('input');

			_this.addClass('bound-spinner');
			_input.val('1');

			_this.find('.btn:first-of-type').on('click', function() {
				var thisSpinner = $(this).parent().parent();
				var spinnerVal = parseInt(thisSpinner.children("input").val());
				if (!isNaN(spinnerVal)) {
					if (spinnerVal < 99) {
						thisSpinner.children("input").val(spinnerVal + 1);
					}   
				} else {
					thisSpinner.children("input").val(1);
				}
				updateAttached(thisSpinner);
			});

			_this.find('.btn:last-of-type').on('click', function() {
				var thisSpinner = $(this).parent().parent();
				var spinnerVal = parseInt(thisSpinner.children("input").val());
				if (!isNaN(spinnerVal)) {
					if (spinnerVal > 1) {
						thisSpinner.children("input").val(spinnerVal - 1);
					}   
				} else {
					thisSpinner.children("input").val(1);
				}
				updateAttached(thisSpinner);
			});

			_input.on('keyup', function() {
				var thisSpinner = $(this).parent();
				var spinnerVal = parseInt($(this).val());
                // x !==  x returns true for NaN value [eg. empty input]
                if (isNaN(spinnerVal) || spinnerVal < 1 || spinnerVal !==  spinnerVal) {
                	$(this).val(1);
                } else if (spinnerVal > 99) {
                	$(this).val(99);
                }
                updateAttached(thisSpinner);
            });
		});
	}

	function later(wait, fn) {
		var check = function(){
			clearInterval(timer);
			if (fn) {
				fn.call()
			}
		}
		var timer = setInterval(check, wait); 
	}

	function setZoomArrows($nextItem) {
		width = $(window).width();
		if (width <= 1024) {
			return;
		}
		if (!($nextItem instanceof jQuery)) {
			$nextItem = $('.img-zoom .owl-item.active')
		}
		var $arrows = $('.main-arrows')
		var $arrowsVideo = $('.full-img-video .zoom-arrows-container')
		if ($nextItem.find('.product-full-img-crop.video-js').length > 0) {
			function hide() {
				if (owlFullImgGallery.find('.owl-item.active video').length > 0) {
					$arrowsVideo.show()
					$arrows.hide()
				}
			}
			later(400, hide);
		} else {
			$arrowsVideo.hide();
			$arrows.show();
		}
	}
	function initZoomArrowsEvents(dir) {
		if (dir !== "next" && dir !== "prev") {
			return;
		}

		var $slider = $('.product-zoom-' + dir), 
		$sliderArrow = $slider.find('.product-zoom-' + dir + '-arrow');

		$slider.on("mouseenter", function (event) {
			$sliderArrow.addClass("hover")
		})
		$slider.on("mouseleave", function (event) {
			$sliderArrow.removeClass("hover")
		})
		$slider.on("click", function (event) {
			var gallery = owlProductGallery;
			if ($('.slider-product-mini-gallery.fake-carousel').length > 0) {
				gallery = owlFullImgGallery;
			}
			gallery.trigger(dir + '.owl.carousel');
			owlStop(true);
		})


	}

	function initZoomArrows() {

		setZoomArrows();
		initZoomArrowsEvents("next");
		initZoomArrowsEvents("prev");

	}

	function initTogglers () {
		$(".toggle-header").click(function () {
			var target = $(this).next(".toggle-content");
			if ($(this).find('.fa-caret-down').length > 0) {
				$(this).find('.fa-caret-down').remove()
				$(this).find('.col-xs-12').append('<i class="fa fa-caret-up"></i>')
			} else {
				$(this).find('.fa-caret-up').remove()
				$(this).find('.col-xs-12').append('<i class="fa fa-caret-down"></i>')
			}
			target.slideToggle(400);
		});
	}
	function initProductLists_toCart() {
		// init sliders
		var viewportWidth = $(window).width();
		var uArr = []
		$('.u-handle').each(function (index) {
			uArr[index] = $(this).data("u");
		})
		for (var i = uArr.length - 1; i >= 0; i--) {
			var u = uArr[i]
			var owlWrap = $('.productContainer-' + u + ' .productSlider');
			var owlOptions2 = {
				loop:false,
				margin:0,
				nav:false,
				mouseDrag:false,
				autoplay:false,
				navSpeed:1000,
				autoplayHoverPause:true,
				lazyLoad: true,
				dots:false,
				items:1
			};

	        // checking if the dom element exists

	        if (owlWrap.length > 0) {
	            // check if plugin is loaded
	            if (jQuery().owlCarousel) {

	            	owlWrap.each(function () {

	            		var carousel = $(this), /* .find('.owl-carousel') */
	            		navigation = $(this).parent().parent().parent().find('.colorBoxes'),
	            		nextBtn = navigation.find('.box');

	            		carousel.owlCarousel(owlOptions2);
	                    // Custom Navigation Events
	                    nextBtn.hover(function () {
	                    	var color = $(this).data("color");
	                    	if (viewportWidth > 1024) {
	                    		carousel.trigger('to.owl.carousel', [color, 500, true]);
	                    	}
	                    });


	                });
	            };
	        }
	        $('.productContainer-' + u + ' .productItem .image').hover(
	        	function() {
	        		if (viewportWidth > 1024) {
	        			$(this).parent().find(".hover").fadeIn(200);
	        		}
	        	}, function() {
	        		if (viewportWidth > 1024) {
	        			$(this).parent().find(".hover").fadeOut(200);
	        		}
	        	})
	    }
	}
	function scrollTo($el) {
		var menuheight = $('.mash-menu').outerHeight(true)
		if ($(window).scrollTop() == 0 && $(window).width() > 1280) {
			menuheight -= 39
		}
		if ($(window).scrollTop() == 0 && $(window).width() < 1280 && $(window).width() > 1023 ) {
			menuheight = 155
		}
		if ($(window).width() <= 1023 ) {
			var menuheight = $('.mash-brand').outerHeight(true)
		}
		$('html, body').animate({
			scrollTop: $el.offset().top - menuheight
		}, 1000);
	}
	function openToggler($el) {
		if ($el.find('.toggle-header .fa-caret-down').length > 0) {
			$el.find('.toggle-header .fa-caret-down').remove()
			$el.find('.toggle-header .col-xs-12').append('<i class="fa fa-caret-up"></i>')
			$el.find('.collapse').slideToggle(400);
		}
	}
	function initAll() {
		initSelectPicker();
		initProductGallery();
		thumbOnClick();
		initZoom();
		initZoomArrows();
		initSpinner();
		initTogglers();
		initGalleryModal();
		setFullImgHeight();
		setImgDivHeight();
	}

	function initMeblePw() {
		initColorGallery();
		initProductLists_toCart();
		initAll();
	}

	function initDipPw () {
		initAll();
	}

	function initDipPwComplementary () {
		initSelectPicker();
		initSpinner();
		initGalleryModal();
	}

	return {
		initMeblePw: initMeblePw,
		initDipPw: initDipPw,
		initDipPwComplementary: initDipPwComplementary,
		scrollTo: scrollTo,
		openToggler: openToggler,
		initGalleryModal: initGalleryModal,
		openGalleryModal: openGalleryModal
	}

})();

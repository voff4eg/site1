$(document).ready(function() {
	
	$("div.b-doctor-label__type-link").hover(
		function() {
			$(this).addClass("i-doctor-label_hover");
		},
		function() {
			$(this).removeClass("i-doctor-label_hover");
		}
	);
						   
	new TopMenu("b-top-menu");
	
	new FaqList("b-faq-list");
	
	$(".b-button").each(function() {
		new Button($(this));
	});
	
	$("#registration-link, #login-popup-registration-link").click(function() {
		$("#login-popup:visible").popup();
		
		$("#sign-in-popup").popup({
			after: function($this) {
				$($this).find("[data-placeholder]").placeholder();
			}
		});
		
		return false;
	});
	
	$(".b-top-panel__sign-in__link").click(function() {
		$("#login-popup").popup({
			after: function($this) {
				$($this).find("[data-placeholder]").placeholder();
			}
		});
		return false;
	});
	
	$("[data-placeholder]:visible").placeholder();
	
});

function Button($elem) {
	var self = this;
	self.$elem = $elem;
	
	init();
	
	function init() {
		elemEvents();
	}
	
	function elemEvents() {
		self.$elem
		.hover(
			function() {
				$(this).addClass("i-button-hover");
			},
			function() {
				$(this).removeClass("i-button-hover");
			}
		)
		.mousedown(
			function() {
				$(this).addClass("i-button-active");
			}
		)
		.mouseup(
			function() {
				$(this).removeClass("i-button-active");
			}
		);
	}
}

function FaqList(cls) {
	var self = this;
	self.$elem = $("." + cls);
	
	init();
	
	function init() {
		elemEvents();
	}
	
	function itemToggle($li) {
		$li.toggleClass("b-faq-list__item_type-open");
	}
	
	function elemEvents() {
		self.$elem
			.delegate(".b-faq-list__item__heading__link", "click", function() {
				itemToggle($(this).closest(".b-faq-list__item"));
				return false;
			});
	}
}

function TopMenu(cls) {
	var self = this;
	self.$elem = $("." + cls);
	
	init();
	
	function init() {
		elemEvents();
		createSubmenu();
	}
	
	function createSubmenu() {
		self.$elem.find(".b-top-submenu").each(function() {
			new TopSubmenu($(this));
		});
	}
	
	function itemToggle($li) {
		$li.toggleClass("b-top-menu__item__hover");
	}
	
	function elemEvents() {
		self.$elem.find(".b-top-menu__item").hover(
			function() {
				itemToggle($(this));
				return false;
			},
			function() {
				itemToggle($(this));
				return false;
			}
		);
	}
	
	function TopSubmenu($elem) {
		var self = this;
		self.$elem = $elem;
		
		init();
		
		function init() {
			elemEvents();
		}
		
		function itemToggle($li) {
			$li.toggleClass("b-top-submenu__item__hover");
		}
		
		function elemEvents() {
			self.$elem.find(".b-top-submenu__item").hover(
				function() {
					itemToggle($(this));
				},
				function() {
					itemToggle($(this));
				}
			);
		}
	}
}

(function($) {
	var defaults = {
		opaco:true,
		valign:"center",
		align:"center",
		//after:function(thisElem){}
		closeElem:".b-popup-window__close"
		//close:function(thisElem){} overwrites default function
	};
	
	$.fn.popup = function(params) {
		var options = $.extend({}, defaults, params);
		$(this).each(function() {
			var $this=$(this);
			if(!$this.is(":visible")) {
				var topPx="20px", leftPx="50%", marginLeft=0, outerHeight=$this.outerHeight(), winHeight=$(window).height();
				switch(options.valign) {
					case "top": topPx = $(window).scrollTop() + 20 + "px"; break;
					case "center":
						if (winHeight > outerHeight) {topPx = winHeight/2 + $(window).scrollTop() - outerHeight/2 - 20 + "px";}
						else {topPx = $(window).scrollTop() + 20 + "px";}
						break;
					case "bottom": topPx = $(window).scrollTop()+winHeight-outerHeight-20 + "px";break;
				}
				switch(options.align) {
					case "left": leftPx = "0px"; break;
					case "center":
						leftPx = "50%";
						marginLeft = -$this.outerWidth()/2+"px";
						break;
					case "right": leftPx = $(document).width()-$this.outerWidth()+"px";break;
				}
				if(options.opaco === true) {
					$this.before('<div id="opaco"></div>');
					$("#opaco").css({width:"100%", height:$(document).height()+"px"}).show();
					var closeElem = $("#opaco");
					if(options.closeElem){closeElem=$("#opaco, "+options.closeElem+"");}
					
					var closeFunc = function() {$this.popup(options);};
					if(options.close){closeFunc=function(){options.close(this);};}
					closeElem.click(function(e) {
						closeFunc();
						e.preventDefault();
					});
				}
				$this.show().css({marginLeft:marginLeft, left:leftPx}).animate({top:topPx}, 500, function() {
					if(options.after) {options.after(this);}
				});
			}
			else {
				$this.hide();
				$("#opaco").remove();
				if(options.closeElem){
					$(""+options.closeElem+"").unbind("click");}
			}
			if(options.after) options.after($this);
		});
		return this;
	};
})(jQuery);

(function($) {
	var defaults = {
		//text:"",
		//color:"#aaaaaa"
	};
	$.fn.placeholder = function(params) {
		
		var options = $.extend({}, defaults, params);
		
		$(this).each(function() {
			
			var self = this;
			self.$elem = $(this),
			self.$formField = self.$elem.closest(".b-form-field");
			self.placeholderText = options.text || self.$elem.attr("data-placeholder");
			
			init();
			
			function init() {
				if(!self.$placeholder) {
					createPlaceholder();
				}
				turnOn();
				handleEvents();
			}
			
			function turnOn() {
				if(self.$elem.val() == "") {
					self.$formField.addClass("i-placeholder");
				}
			}
			
			function handleEvents() {
				self.$placeholderText.click(function() {
					self.$elem.focus();
				});
				
				self.$elem
					.focus(function() {
						onFocus();
					})
					.blur(function() {
						onBlur();
					});
				
			}
			
			function createPlaceholder() {
				self.$placeholder = $('<div class="b-form-field__placeholder"><div class="b-form-field__placeholder__text">' + self.placeholderText + '</div></div>');
				self.$placeholderText = self.$placeholder.find(".b-form-field__placeholder__text");
				
				self.$elem.before(self.$placeholder);
				
				setPlaceholderSize();
			}
			
			function setPlaceholderSize() {
				self.$placeholderText
					.css(
						{
							width: self.$elem.outerWidth() + "px",
							height: self.$elem.outerHeight() + "px",
						}
					);
			}
			
			function onFocus() {
				self.$formField.removeClass("i-placeholder");
			}
			
			function onBlur() {
				if (self.$elem.val() == "") {
					self.$formField.addClass("i-placeholder");
				}
			}
			
		});
		return this;
	};
})(jQuery);

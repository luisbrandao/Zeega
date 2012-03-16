(function(Layer){

	Layer.Views.Lib.Slider = Layer.Views.Lib.extend({
		
		defaults : {
			min : 0,
			max : 100,
			step : 1,
			value : 100,
			silent : false,
			suffix : '',
			css : false,
			scaleWith : false,
			scaleValue : false,
			callback : false
		},
		
		initialize : function( args )
		{
			this.settings = _.defaults( args, this.defaults );
		},
		
		render : function()
		{
			var _this = this;
			//slider stuff here
			$(this.el).slider({
				min : this.settings.min,
				max : this.settings.max,
				value : this.model.get('attr')[this.settings.property] || this.settings.value,
				step : this.settings.step,
				slide : function(e, ui)
				{
					_this.model.get('attr')[_this.settings.property] = ui.value;
					_this.model.trigger('update_visual')
				},
				stop : function(e,ui)
				{
					_this.model.save();
				}
			});
			
			return this;
		}
		
	});


	Layer.Views.ImageControls = Layer.Views.Controls.extend({
		
		render : function()
		{
			
			var scaleSlider = new Layer.Views.Lib.Slider({
				property : 'width',
				model: this.model,
				label : 'Scale',
				min : 1,
				max : 200,
			});
			
			var opacitySlider = new Layer.Views.Lib.Slider({
				property : 'opacity',
				model: this.model,
				label : 'Scale',
				step : 0.01,
				max : 1,
			});
			
			this.controls.append( scaleSlider.render().el )
				.append( opacitySlider.render().el );
			
			return this;
		
		}
		
	});

	Layer.Views.ImageVisual = Layer.Views.Visual.extend({
		
		render : function()
		{
			var img = $('<img>')
				.attr('src', this.attr.url)
				.css({'width':'100%'});

			$(this.el).html( img );
				
			return this;
		}
	});

	Layer.Image = Layer.Model.extend({
			
		layerType : 'VISUAL',
		draggable : true,
		linkable : true,

		defaultAttributes : {
			'title' : 'Image Layer',
			'url' : 'none',
			'left' : 0,
			'top' : 0,
			'height' : 100,
			'width' : 100,
			'opacity':1,
			'aspect':1.33,
			'citation':true,
		},

		init : function()
		{
			console.log('IMAGE INIT')
		},

	
		preload : function( target )
		{
			console.log('image-preload')
			var _this = this;


			var img = $('<img>')
				.attr( 'src' , this.attr.url )
				.css( 'width', '100%');
			//img.load(function(){target.trigger('ready', { 'id' : _this.model.id } )});

	console.log( this.innerDisplay );
		
			$(this.display).css('height','laskdfh');
		
			$(this.innerDisplay).append( img );
			
			
				/*
				console.log(img.height() );
				img.addClass('linked-layer-hover');
			*/
		
			target.trigger( 'ready' , { 'id' : this.model.id } );
		},
	
		play : function( z )
		{
			this.display.css({'z-index':z,'top':this.attr.top+"%",'left':this.attr.left+"%"});
		
			if(this.attr.link_to)
			{
				var _this = this;
				_this.display.addClass('link-blink')
				_.delay( function(){ _this.display.removeClass('link-blink') }, 2000  )
			
			}
		},

		stash : function()
		{
			this.display.css({'top':"-1000%",'left':"-1000%"});
		}
	
		
	});
	
})(zeega.module("layer"));
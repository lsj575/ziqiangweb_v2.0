;(function($){
	var Carousel=function(poster){
		var self=this;
		//保存单个对象
		this.poster=poster;
		this.posterItemMain=poster.find(".poster-list");
		this.nextBtn=poster.find(".poster-next-btn");
		this.prevBtn=poster.find(".poster-prev-btn");
		this.posterItems=poster.find("li.poster-item");
		this.posterFirstItem=this.posterItems.eq(0);
		this.posterLastItem=this.posterItems.last();
		this.rotateFlag=true;
		//默认配置参数
		this.setting={
					"width":$(window).width(),
					"height":350,
					"posterWidth":$(window).width()-20,
					"posterHeight":350,
					"scale":0.9,
					"speed":500,
					"autoplay":true,
					"delay":2000,
					"verticalAlign":"middle"
		}
		$.extend(this.setting,this.getSetting());
		
		//console.log(this.getSetting());
		this.setSettingValue();
		this.setPosterPos();
		this.nextBtn.click(function(){
			if(self.rotateFlag){
				self.rotateFlag=false;
			self.carouseRotate("left");
		}
		});
		this.prevBtn.click(function(){
			if(self.rotateFlag){
				self.rotateFlag=false;
			self.carouseRotate("right");
		}
		});
		if(this.setting.autoplay){
			this.autoplay();
			this.poster.hover(function(){
				window.clearInterval(self.timer)
			},function(){
				self.autoplay();
			});
		}
	}
	Carousel.prototype={
		autoplay:function(){
			var self=this;
			this.timer=window.setInterval(function(){
				self.nextBtn.click();
			},this.setting.delay);
		},
		//旋转
		carouseRotate:function(dir){
			var _this_=this;
			var zIndexArr=[];
			if(dir==="left"){
				this.posterItems.each(function(){
						var self=$(this),
						prev=self.prev().get(0)?self.prev():_this_.posterLastItem,
						width=prev.width(),
						height=prev.height(),
						zIndex=prev.css("zIndex"),
						opacity=prev.css("opacity"),
						left=prev.css("left"),
						top=prev.css("top");
						zIndexArr.push(zIndex);
						self.animate({
							width: width,
							height: height,
							opacity:opacity,
							left:left,
							top:top,
						},_this_.setting.speed,function(){
							_this_.rotateFlag=true;
						});
				});
				this.posterItems.each(function(i){
					$(this).css("zIndex",zIndexArr[i]);
				});
			}
			else if(dir==="right"){
				this.posterItems.each(function(){
						var self=$(this),
						next=self.next().get(0)?self.next():_this_.posterFirstItem,
						width=next.width(),
						height=next.height(),
						zIndex=next.css("zIndex"),
						opacity=next.css("opacity"),
						left=next.css("left"),
						top=next.css("top");
						zIndexArr.push(zIndex);
						self.animate({
							width: width,
							height: height,
							opacity:opacity,
							left:left,
							top:top,
						},_this_.setting.speed,function(){
							_this_.rotateFlag=true;
						});
				});
				this.posterItems.each(function(i){
					$(this).css("zIndex",zIndexArr[i]);
				});
			}
		},
		//设置声誉的针的位置关系
		setPosterPos:function(){
			var self=this;
			var sliceItems=this.posterItems.slice(1),
				sliceSize =sliceItems.size()/2
				rightSlice=sliceItems.slice(0,sliceSize),
				leftSlice=sliceItems.slice(sliceSize),
				level	  = Math.floor(this.posterItems.size()/2)
				var rw=this.setting.posterWidth,
					rh=this.setting.posterHeight
					gap=((this.setting.width-this.setting.posterWidth)/2)/level;
					var firstLeft =(this.setting.width-this.setting.posterWidth)/2;
					var fixOffsetLeft=firstLeft+rw;
				//设置右边真的位置关系以及宽高等
				rightSlice.each(function(i){
					level--;
					rw=rw*self.setting.scale;
					rh=rh*self.setting.scale;
					var j=i;

					$(this).css({
						zIndex:level,
						width:rw ,
						height:rh,
						opacity:1/(++j),
						left:fixOffsetLeft+(++i)*gap-rw,
						top:self.setVertical(rh),

					});
				});
				//设置左边的位置关系
				var lw=rightSlice.last().width(),
					lh=rightSlice.last().height(),
					oloop=Math.floor(this.posterItems.size()/2);
				leftSlice.each(function(i) {

					$(this).css({
						zIndex:i,
						width:lw ,
						height:lh,
						opacity:1/oloop,
						left:i*gap,
						top:self.setVertical(lh),

					});
					lw=lw/self.setting.scale;
					lh=lh/self.setting.scale;
					oloop--;
				});

		},
		//设置垂直排列对齐
		setVertical:function(height){
			var verticalType=this.setting.verticalAlign,
			top=0;
			if(verticalType==="middle"){
				top=(this.setting.height-height)/2;
			} else if(verticalType==="top"){
				top=0;
			}else if(verticalType==="bottom"){
				top=this.setting.height-height;
			}else{
				top=(this.setting.height-height)/2;
			}
			return top;
		},
		setSettingValue:function(){
			this.poster.css({
				width:this.setting.width,
				height:this.setting.height,
			});
			this.posterItemMain.css({
				width:this.setting.width,
				height:this.setting.height,
			});
			//计算下上下切换按钮宽度
			var w=(this.setting.width-this.setting.posterWidth)/2;
			this.nextBtn.css({
				width:w,
				height:this.setting.height,
				zIndex:Math.ceil(this.posterItems.size()/2),
			});
			this.prevBtn.css({
				width:w,
				height:this.setting.height,
				zIndex:Math.ceil(this.posterItems.size()/2),
			});
			this.posterFirstItem.css({
				left:w,
				width:this.setting.posterWidth,
				height:this.setting.posterHeight,
				zIndex:Math.floor(this.posterItems.size()/2),
			});

		},
			//获取人工配置参数
			getSetting:function(){
					var setting=this.poster.attr("data-setting");
					if(setting&&setting!="")
					{
						return	$.parseJSON(setting);
					}
					else {
						return{}
					}
				}
			
	}
	Carousel.init=function(posters){
		var _this_=this;
		posters.each(function(){
			new _this_($(this));
		})
	}
	window["Carousel"]=Carousel;
})(jQuery);
(function (lib, img, cjs, ss) {

var p; // shortcut to reference prototypes
lib.webFontTxtFilters = {}; 

// library properties:
lib.properties = {
	width: 728,
	height: 90,
	fps: 24,
	color: "#FFFFFF",
	opacity: 1.00,
	webfonts: {},
	manifest: [
		{src:"images/CTA_Button.jpg", id:"CTA_Button"},
		{src:"images/img1.jpg", id:"img1"},
		{src:"images/img3.jpg", id:"img3"},
		{src:"images/img4.jpg", id:"img4"},
		{src:"images/Logo.png", id:"Logo"},
		{src:"images/replay.png", id:"replay"},
		{src:"images/txt1.png", id:"txt1"},
		{src:"images/txt2.png", id:"txt2"},
		{src:"images/txt3.png", id:"txt3"},
		{src:"images/txt4.png", id:"txt4"}
	]
};



lib.ssMetadata = [];


lib.webfontAvailable = function(family) { 
	lib.properties.webfonts[family] = true;
	var txtFilters = lib.webFontTxtFilters && lib.webFontTxtFilters[family] || [];
	for(var f = 0; f < txtFilters.length; ++f) {
		txtFilters[f].updateCache();
	}
};
// symbols:



(lib.CTA_Button = function() {
	this.initialize(img.CTA_Button);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,152,37);


(lib.img1 = function() {
	this.initialize(img.img1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,728,90);


(lib.img3 = function() {
	this.initialize(img.img3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,728,90);


(lib.img4 = function() {
	this.initialize(img.img4);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,728,90);


(lib.Logo = function() {
	this.initialize(img.Logo);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,98,26);


(lib.replay = function() {
	this.initialize(img.replay);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,13,16);


(lib.txt1 = function() {
	this.initialize(img.txt1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,199,72);


(lib.txt2 = function() {
	this.initialize(img.txt2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,333,83);


(lib.txt3 = function() {
	this.initialize(img.txt3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,330,62);


(lib.txt4 = function() {
	this.initialize(img.txt4);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,131,48);


(lib.txt4_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.txt4();

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,131,48);


(lib.txt3_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.txt3();

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,330,62);


(lib.txt2_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.txt2();

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,333,83);


(lib.txt1_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.txt1();

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,199,72);


(lib.replay_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.replay();

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,13,16);


(lib.Logo_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.Logo();

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,98,26);


(lib.img4_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.img4();

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,728,90);


(lib.img3_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.img3();

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,728,90);


(lib.img1_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.img1();

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,728,90);


(lib.CTA_Button_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.CTA_Button();
	this.instance.setTransform(-20,96);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-20,96,152,37);


(lib.btn = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AvIPnIAA/OIeRAAIAAfOg");
	this.shape.setTransform(97,100);
	this.shape._off = true;

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(3).to({_off:false},0).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = null;


(lib.Main = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{lop:0});

	// timeline functions:
	this.frame_0 = function() {
		/* Click to Go to Web Page
		Clicking on the specified symbol instance loads the URL in a new browser window.
		
		Instructions:
		1. Replace http://www.adobe.com with the desired URL address.
		   Keep the quotation marks ("").
		*/
		
		this.btn1.addEventListener("click", fl_ClickToGoToWebPage1);
		
		function fl_ClickToGoToWebPage1() {
			window.open(clickTag, "_blank");
		}
	}
	this.frame_322 = function() {
		/* Stop at This Frame
		The  timeline will stop/pause at the frame where you insert this code.
		Can also be used to stop/pause the timeline of movieclips.
		*/
		
		this.stop();
		
		/* Mouse Click Event
		Clicking on the specified symbol instance executes a function in which you can add your own custom code.
		
		Instructions:
		1. Add your custom code on a new line after the line that says "// Start your custom code" below.
		The code will execute when the symbol instance is clicked.
		*/
		
		this.replay_btn.addEventListener("click", rePlayHandler.bind(this));
		
		function rePlayHandler()
		{
			// Start your custom code
			// This example code displays the words "Mouse clicked" in the Output panel.
			this.gotoAndPlay("lop");
			// End your custom code
		}
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(322).call(this.frame_322).wait(1));

	// Replay_btn
	this.replay_btn = new lib.btn();
	this.replay_btn.setTransform(693.1,0,0.144,0.144);
	this.replay_btn._off = true;
	new cjs.ButtonHelper(this.replay_btn, 0, 1, 2, false, new lib.btn(), 3);

	this.timeline.addTween(cjs.Tween.get(this.replay_btn).wait(321).to({_off:false},0).wait(2));

	// Replay
	this.instance = new lib.replay_1();
	this.instance.setTransform(711.7,10.6,1,1,0,0,0,6.5,8);
	this.instance.alpha = 0;
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(313).to({_off:false},0).to({alpha:0.801},8).wait(2));

	// btn1
	this.btn1 = new lib.btn();
	this.btn1.setTransform(0,0,3.753,0.45);
	new cjs.ButtonHelper(this.btn1, 0, 1, 2, false, new lib.btn(), 3);

	this.timeline.addTween(cjs.Tween.get(this.btn1).wait(323));

	// CTA_Button
	this.instance_1 = new lib.CTA_Button_1();
	this.instance_1.setTransform(478.9,3.9,0.868,1,0,0,0,76,74);
	this.instance_1.alpha = 0;
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(293).to({_off:false},0).to({alpha:1},20).wait(10));

	// txt4
	this.instance_2 = new lib.txt4_1();
	this.instance_2.setTransform(722,50,1,1,0,0,0,145,13);
	this.instance_2.alpha = 0;
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(272).to({_off:false},0).to({alpha:1},20).wait(31));

	// txt3
	this.instance_3 = new lib.txt3_1();
	this.instance_3.setTransform(158.5,61.5,1,1,0,0,0,137.5,47.5);
	this.instance_3.alpha = 0;
	this.instance_3._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(261).to({_off:false},0).to({alpha:1},20).wait(42));

	// Logo2
	this.instance_4 = new lib.Logo_1();
	this.instance_4.setTransform(637.5,24,1,1,0,0,0,46.5,11);
	this.instance_4.alpha = 0;
	this.instance_4._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_4).wait(248).to({_off:false},0).to({alpha:1},20).wait(55));

	// txt2
	this.instance_5 = new lib.txt2_1();
	this.instance_5.setTransform(358.5,56.5,1,1,0,0,0,128.5,52.5);
	this.instance_5.alpha = 0;
	this.instance_5._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_5).wait(119).to({_off:false},0).to({alpha:1},20).wait(78).to({alpha:0},20).to({_off:true},1).wait(85));

	// Logo
	this.instance_6 = new lib.Logo_1();
	this.instance_6.setTransform(652.5,44,1,1,0,0,0,46.5,11);
	this.instance_6.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_6).to({alpha:1},19).wait(204).to({alpha:0},20).to({_off:true},1).wait(79));

	// txt1
	this.instance_7 = new lib.txt1_1();
	this.instance_7.setTransform(139,40,1,1,0,0,0,117,29);
	this.instance_7.alpha = 0;
	this.instance_7._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_7).wait(19).to({_off:false},0).to({alpha:1},19).wait(172).to({alpha:0},19).wait(1).to({x:149.5,y:51.5},0).to({_off:true},1).wait(92));

	// img1
	this.instance_8 = new lib.img1_1();
	this.instance_8.setTransform(150,125,1,1,0,0,0,150,125);
	this.instance_8.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_8).to({alpha:1},19).wait(50).to({x:-581},40,cjs.Ease.get(1)).to({_off:true},1).wait(213));

	// Dark_Shade
	this.shape = new cjs.Shape();
	this.shape.graphics.f("rgba(51,51,51,0)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape.setTransform(364,45);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("rgba(48,48,48,0.024)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_1.setTransform(364,45);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("rgba(46,46,46,0.051)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_2.setTransform(364,45);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("rgba(43,43,43,0.075)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_3.setTransform(364,45);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("rgba(41,41,41,0.098)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_4.setTransform(364,45);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("rgba(38,38,38,0.125)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_5.setTransform(364,45);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("rgba(36,36,36,0.149)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_6.setTransform(364,45);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("rgba(33,33,33,0.173)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_7.setTransform(364,45);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("rgba(31,31,31,0.2)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_8.setTransform(364,45);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("rgba(28,28,28,0.224)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_9.setTransform(364,45);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("rgba(26,26,26,0.251)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_10.setTransform(364,45);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("rgba(23,23,23,0.275)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_11.setTransform(364,45);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("rgba(20,20,20,0.298)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_12.setTransform(364,45);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("rgba(18,18,18,0.325)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_13.setTransform(364,45);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("rgba(15,15,15,0.349)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_14.setTransform(364,45);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("rgba(13,13,13,0.373)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_15.setTransform(364,45);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("rgba(10,10,10,0.4)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_16.setTransform(364,45);

	this.shape_17 = new cjs.Shape();
	this.shape_17.graphics.f("rgba(8,8,8,0.424)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_17.setTransform(364,45);

	this.shape_18 = new cjs.Shape();
	this.shape_18.graphics.f("rgba(5,5,5,0.447)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_18.setTransform(364,45);

	this.shape_19 = new cjs.Shape();
	this.shape_19.graphics.f("rgba(3,3,3,0.475)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_19.setTransform(364,45);

	this.shape_20 = new cjs.Shape();
	this.shape_20.graphics.f("rgba(0,0,0,0.498)").s().p("Eg43AHCIAAuDMBxvAAAIAAODg");
	this.shape_20.setTransform(364,45);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[{t:this.shape}]},119).to({state:[{t:this.shape_1}]},1).to({state:[{t:this.shape_2}]},1).to({state:[{t:this.shape_3}]},1).to({state:[{t:this.shape_4}]},1).to({state:[{t:this.shape_5}]},1).to({state:[{t:this.shape_6}]},1).to({state:[{t:this.shape_7}]},1).to({state:[{t:this.shape_8}]},1).to({state:[{t:this.shape_9}]},1).to({state:[{t:this.shape_10}]},1).to({state:[{t:this.shape_11}]},1).to({state:[{t:this.shape_12}]},1).to({state:[{t:this.shape_13}]},1).to({state:[{t:this.shape_14}]},1).to({state:[{t:this.shape_15}]},1).to({state:[{t:this.shape_16}]},1).to({state:[{t:this.shape_17}]},1).to({state:[{t:this.shape_18}]},1).to({state:[{t:this.shape_19}]},1).to({state:[{t:this.shape_20}]},1).to({state:[{t:this.shape_20}]},89).to({state:[{t:this.shape_19}]},1).to({state:[{t:this.shape_18}]},1).to({state:[{t:this.shape_17}]},1).to({state:[{t:this.shape_16}]},1).to({state:[{t:this.shape_15}]},1).to({state:[{t:this.shape_14}]},1).to({state:[{t:this.shape_13}]},1).to({state:[{t:this.shape_12}]},1).to({state:[{t:this.shape_11}]},1).to({state:[{t:this.shape_10}]},1).to({state:[{t:this.shape_9}]},1).to({state:[{t:this.shape_8}]},1).to({state:[{t:this.shape_7}]},1).to({state:[{t:this.shape_6}]},1).to({state:[{t:this.shape_5}]},1).to({state:[{t:this.shape_4}]},1).to({state:[{t:this.shape_3}]},1).to({state:[{t:this.shape_2}]},1).to({state:[{t:this.shape_1}]},1).to({state:[{t:this.shape}]},1).to({state:[]},1).wait(74));

	// img3
	this.instance_9 = new lib.img3_1();
	this.instance_9.setTransform(878,125,1,1,0,0,0,150,125);
	this.instance_9._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_9).wait(69).to({_off:false},0).to({x:150},39,cjs.Ease.get(1)).wait(120).to({alpha:0},20).to({_off:true},1).wait(74));

	// img4
	this.instance_10 = new lib.img4_1();
	this.instance_10.setTransform(150,125,1,1,0,0,0,150,125);

	this.timeline.addTween(cjs.Tween.get(this.instance_10).wait(323));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,728,90);


// stage content:
(lib.Havas_Banner_728x90 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// BDR
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#666666").s().p("AgDThMAAAgnBIAIAAMAAAAnBg");
	this.shape.setTransform(726.8,44.9,2.427,0.36);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#666666").s().p("A3aAFIAAgIMAu2AAAIAAAIg");
	this.shape_1.setTransform(364,89.8,2.427,0.36);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#666666").s().p("A3aAFIAAgIMAu2AAAIAAAIg");
	this.shape_2.setTransform(364,0.2,2.427,0.36);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#666666").s().p("AgDThMAAAgnBIAIAAMAAAAnBg");
	this.shape_3.setTransform(1.2,44.9,2.427,0.36);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

	// Main
	this.instance = new lib.Main();
	this.instance.setTransform(150,125,1,1,0,0,0,150,125);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(364,45,728,90.1);

})(lib = lib||{}, images = images||{}, createjs = createjs||{}, ss = ss||{});
var lib, images, createjs, ss;
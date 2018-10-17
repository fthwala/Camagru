function check(obj)
{
    var imagescr = obj.src;
    var imgsup = document.getElementById('superimg'); /* self explanatory */
    imgsup.setAttribute('src', imagescr);
    document.getElementById('cbutton').disabled = false;
}

(function()
{
	var video = document.querySelector("#videoElement"), 
		canvas = document.getElementById("canvas"),
		context = canvas.getContext('2d'),
		flow = document.getElementById('superimg'),
		vendorUrl = window.URL || window.webkitURL;

	/* get the media from the browsers */
	navigator.getMedia = navigator.getUserMedia ||
						 navigator.webkitGetUserMedia ||
						 navigator.mozGetUserMedia ||
						 navigator.msGetUserMedia;
	
	function handleVideo(stream)
	{
		video.src = window.URL.createObjectURL(stream);
		video.play();
	}
	function videoError(e)
	{
		console.log("getUserMedia() not supported");
	}

	if (navigator.getUserMedia)
	{
		navigator.getUserMedia({video: true}, handleVideo, videoError);
	}

	document.getElementById("cbutton").addEventListener("click", function ()
	{
		/* 	context.drawImage(img,x,y,width,height); */
		context.drawImage(video, 0, 0, 500, 375);
		context.drawImage(flow,10,10,100,100);
		var element = document.getElementById('picture');
		var pic = canvas.toDataURL('image/jpeg');
		element.value = pic;
		document.getElementById('capture-form').submit();
	})
})();



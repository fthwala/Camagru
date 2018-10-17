function checkPhoto(obj)
{
    var imagescr = obj.src;
    var imgsup = document.getElementById('superimg');
    imgsup.setAttribute('src', imagescr);
}

(function()
{
    var canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        flow = document.getElementById('superimg'),
        image = document.getElementById('img_upload');


    document.getElementById('capture2').addEventListener('click', function ()
    {
        /*  context.drawImage(img,x,y,width,height); */
        context.drawImage(image, 0, 0, 640, 485);
        context.drawImage(flow,10,10,100,100);
        var element = document.getElementById('picture');
        var img = canvas.toDataURL('image/jpeg');
        element.value = img;
        document.getElementById('capture-form').submit();
    });

}) ();
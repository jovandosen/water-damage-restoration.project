var current = timer = totalImages = 0;

function homepageCarousel()
{
    var basePath = themeData.templateUrl;
    var images = ['forest.jpg', 'rocks.jpg', 'water.jpg'];
    var img = document.getElementById("carousel-img");
    totalImages = images.length;
    if(current === totalImages){
        current = 0;
    }
    img.src = basePath + '/assets/images/' + images[current];
    current++;
    timer = setTimeout(homepageCarousel, 3000);
}

homepageCarousel();
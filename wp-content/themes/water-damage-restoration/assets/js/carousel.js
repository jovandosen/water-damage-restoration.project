var current = timer = totalImages = 0;
var selectorsDisplayed = false;

function homepageCarousel()
{
    var basePath = themeData.templateUrl;
    var images = ['forest.jpg', 'rocks.jpg', 'water.jpg'];
    var img = document.getElementById("carousel-img");
    var imageSelectorsBox = document.getElementById("image-selectors-box");
    totalImages = images.length;
    if(current === totalImages){
        current = 0;
    }
    img.src = basePath + '/assets/images/' + images[current];
    current++;
    if(!selectorsDisplayed){
        selectorsDisplayed = true;
        for(var i = 0; i < totalImages; i++){
            var div = document.createElement("div");
            div.setAttribute("class", "image-selector");
            div.setAttribute("id", i);
            div.addEventListener("click", changeImage);
            imageSelectorsBox.appendChild(div);
        }
    }
    timer = setTimeout(homepageCarousel, 3000);
}

homepageCarousel();

function changeImage()
{
    clearTimeout(timer);
    current = parseInt(this.id);
    homepageCarousel();
}
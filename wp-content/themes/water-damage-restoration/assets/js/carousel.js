var current = timer = totalImages = 0;
var selectorsDisplayed = false;

function homepageCarousel()
{
    var basePath = themeData.templateUrl;
    var images = ['forest.jpg', 'rocks.jpg', 'water.jpg'];
    var img = document.getElementById("carousel-img");
    var imageSelectorsBox = document.getElementById("image-selectors-box");
    var activeItem;
    var inActiveItem;
    totalImages = images.length;
    if(current === totalImages){
        inActiveItem = document.getElementById(current - 1);
        inActiveItem.removeAttribute("style");
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
    activeItem = document.getElementById(current - 1);
    if(current > 1){
        inActiveItem = document.getElementById(current - 2);
        inActiveItem.removeAttribute("style");
    }
    activeItem.setAttribute("style", "background-color: red");
    timer = setTimeout(homepageCarousel, 3000);
}

homepageCarousel();

function changeImage()
{
    clearTimeout(timer);
    var allImages = document.getElementsByClassName("image-selector");
    for(var i = 0; i < allImages.length; i++){
        allImages[i].removeAttribute("style");
    }
    current = parseInt(this.id);
    homepageCarousel();
}
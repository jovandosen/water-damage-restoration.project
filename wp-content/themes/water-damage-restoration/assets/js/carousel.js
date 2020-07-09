var current = timer = totalImages = 0;
var selectorsDisplayed = false;

function homepageCarousel()
{
    var basePath = themeData.templateUrl;
    var data = [
        { 
            img: 'slide-img-one.png', 
            titleOne: 'LOREM IPSUM DOLOR SIT AMET', 
            titleTwo: 'Lorem ipsum dolor sit amet', 
            description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 
            buttonText: 'Lorem ipsum' 
        },
        { 
            img: 'slide-img-two.png', 
            titleOne: 'LOREM IPSUM DOLOR SIT AMET', 
            titleTwo: 'Lorem ipsum dolor sit amet', 
            description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 
            buttonText: 'Lorem ipsum' 
        }
    ];
    var img = document.getElementById("carousel-img");
    var imageSelectorsBox = document.getElementById("image-selectors-box");
    var titleOneContent = document.getElementById("title-one-content");
    var titleTwoContent = document.getElementById("title-two-content");
    var descriptionContent = document.getElementById("description-content");
    var buttonContent = document.getElementById("read-more-btn-content");
    var activeItem;
    var inActiveItem;
    totalImages = data.length;
    if(current === totalImages){
        inActiveItem = document.getElementById(current - 1);
        inActiveItem.removeAttribute("style");
        current = 0;
    }
    img.src = basePath + '/assets/images/' + data[current].img;
    titleOneContent.innerHTML = data[current].titleOne;
    titleTwoContent.innerHTML = data[current].titleTwo;
    descriptionContent.innerHTML = data[current].description;
    buttonContent.innerHTML = data[current].buttonText;
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
    activeItem.setAttribute("style", "background-color: white");
    //timer = setTimeout(homepageCarousel, 3000);
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
const images = document.querySelectorAll("img.src");

const imgOptions ={
    threshold: 1,
    effect: 'fadeIn'
};

function preloadImage(img){
    const src = img.getAttribute("img.src");
    if(!src)
    {   
        return;
    }
    img.src =src;
}


const imgObServer =new IntersectionObserver(
    (entries, imgOptions)=>{
        entries.forEach(entry=>{
            if(!entry.isIntersecting)
            {
                return;
            }
            else{
                preloadImage(entry.target);
                imgObServer.unobserve(entry.target);
            }
        })
}, imgOptions);

images.forEach(images =>{
    imgObServer.observe(images);
});
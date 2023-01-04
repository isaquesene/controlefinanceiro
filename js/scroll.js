//scroll button
let calcScrollValue = () =>{
    let scrollProgress = document.getElementById("progress");
    let progressValue = document.getElementById("progress-value");
    let pos = document.documentElement.scrollTop;
    //console.log(pos);
    let calcHeight = 
      document.documentElement.scrollHeight - 
      document.documentElement.clientHeight;
      //console.log(calcHeight);
  
    let scrollValue = Math.round((pos * 100) / calcHeight);
    //console.log(scrollValue);

    if(pos > 100){
        scrollProgress.style.display = "inline-block";
    }else{
        scrollProgress.style.display = "none";
    }

    scrollProgress.addEventListener("click", () =>{
        document.documentElement.scrollTop = 0;
    });
   };
  
   window.onscroll = calcScrollValue;
   window.onload = calcScrollValue;
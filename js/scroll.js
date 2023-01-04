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
        scrollProgress.style.display = "grid";
    }else{
        scrollProgress.style.display = "none";
    }
   };
  
   window.onscroll = calcScrollValue;
   window.onload = calcScrollValue;
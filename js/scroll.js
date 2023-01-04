//scroll button
let calcScrollValue = () =>{
    let scrollProgress = document.getElementById("progress");
    let progressValue = document.getElementById("progress-value");
    let pos = document.documentElement.scrollTop;
    //console.log(pos);
    let calcHeigth = 
      document.documentElement.scrollHeight - 
      document.documentElement.clientHeight;
      //console.log(calcHeigth);
  
    let scrollValue = Math.round((pos * 100) / calcHeigth);
    //console.log(scrollValue);

    if(pos > 100){
        scrollProgress.style.display = "grid";
    }else{
        scrollProgress.style.display = "none";
    }
   };
  
   window.sonscroll = calcScrollValue;
   window.onload = calcScrollValue;
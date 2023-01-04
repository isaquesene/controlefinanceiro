/*var abre = document.getElementById("abre").value;
const modal = document.querySelector('.modal-container')


function editItem(index){
    openModal(true, index)
  }

function openModal(id){

    abre.value = id
    modal.classList.add('active')
  
  
    modal.onclick = e =>{
      if(e.target.className.indexOf('modal-container') !== -1){
        modal.classList.remove('active')
      }
    }
  }
  */

  const navMenu = document.getElementById('nav-menu'),
        toggleMenu = document.getElementById('toggle-menu'),
        closeMenu = document.getElementById('close-menu')

  toggleMenu.addEventListener('click', () =>{
    navMenu.classList.toggle('show')
  })

  closeMenu.addEventListener('click', () =>{
    navMenu.classList.remove('show')
  })

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
  console.log(scrollValue);
 };

 window.sonscroll = calcScrollValue;
 window.onload = calcScrollValue;
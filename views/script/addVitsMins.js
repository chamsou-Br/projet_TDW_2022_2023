// document.querySelector('.search-vits').hidden = true 
// document.querySelector('.search-mins').hidden = true 

let vit = document.querySelector('.vits-select')

vit.addEventListener("change",(e)=> {
    e.preventDefault();
    document.querySelector('.search-vits').hidden = false
    //add child 
    let val =vit.value
    console.log("firast",val)
    let ingredient_item = document.createElement("div");
    ingredient_item.classList.add('ingredient-item')
    ingredient_item.classList.add('vits-item')
    ingredient_item.style = "position: relative;"
    let div = document.createElement("div");
    let span = document.createElement("span");
    let h5 = document.createElement("h5");
    h5.innerText = val
    let i = document.createElement("i");
    i.style = "position : absolute  ;top:-20px;left:-10px"
    i.className =  "bi bi-x-circle min-close"
    i.addEventListener("click",(e=>{
      i.parentElement.parentNode.removeChild( i.parentElement)
    }))
    // get number of item
    let items = document.querySelectorAll(".vits-item")
    span.innerText =  items.length +1 ;
    div.appendChild(span)
    ingredient_item.appendChild(div)
    ingredient_item.appendChild(i)
    ingredient_item.appendChild(h5)
        // add input 
    let input = document.createElement('input')
    input.type = "hidden"
    input.value = val
    input.name = "vits[]"
    ingredient_item.appendChild(input)
    let ingredient_select = document.querySelector(".search-vits")
    ingredient_select.appendChild(ingredient_item)



  })

  let min = document.querySelector('.mins-select')
  min.addEventListener("change",(e)=> {
    e.preventDefault();
    document.querySelector('.search-mins').hidden = false 
    //add child 
    let val =min.value
    let ingredient_item = document.createElement("div");
    ingredient_item.classList.add('ingredient-item')
    ingredient_item.classList.add('mins-item')
    ingredient_item.style = "position: relative;"
    let div = document.createElement("div");
    let span = document.createElement("span");
    let h5 = document.createElement("h5");
    let i = document.createElement("i");
    i.style = "position : absolute  ;top:-20px;left:-10px"
    i.className =  "bi bi-x-circle min-close"
    i.addEventListener("click",(e=>{
      i.parentElement.parentNode.removeChild( i.parentElement)
    }))
    h5.innerText = val
    // get number of item
    let items = document.querySelectorAll(".mins-item")
    span.innerText =  items.length +1 ;
    div.appendChild(span)
    ingredient_item.appendChild(div)
    ingredient_item.appendChild(i)
    ingredient_item.appendChild(h5)
        // add input 
    let input = document.createElement('input')
    input.type = "hidden"
    input.value = val
    input.name = "mins[]"
    ingredient_item.appendChild(input)
    let ingredient_select = document.querySelector(".search-mins")
    ingredient_select.appendChild(ingredient_item)



  })

  let vitsClose = document.querySelectorAll('.vit-close');

  if (vitsClose.length> 0) {

    vitsClose.forEach((v,i) => {
      v.addEventListener("click",(e)=> {
        console.log(i,document.querySelectorAll(".vits-item")[i])
        e.preventDefault();
        document.querySelectorAll(".vits-item")[i].parentNode.removeChild(document.querySelectorAll(".vits-item")[i]);
      })
      
    })
  }

  let minsClose = document.querySelectorAll('.min-close');

  if (minsClose.length> 0) {

    minsClose.forEach((v,i) => {
      v.addEventListener("click",(e)=> {
        console.log(i,document.querySelectorAll(".mins-item")[i])
        e.preventDefault();
        document.querySelectorAll(".mins-item")[i].parentNode.removeChild(document.querySelectorAll(".mins-item")[i]);
      })
      
    })
  }


  function sort(id) {
  
    // Declaring Variables
    var geek_list, i, run, li, stop;

    // Taking content of list as input
    geek_list = document.querySelector(".table");

    run = true;

    while (run) {
        run = false;
        li = geek_list.getElementsByTagName("tr");

        // Loop traversing through all the list items
        for (i = 1; i < (li.length - 1); i++) {
            stop = false;
            let val1 , val2 ;
            if(id == 0) {
              val1 = li[i].getElementsByTagName("th")[0].innerHTML.toLowerCase();
              val2 = li[i+1].getElementsByTagName("th")[0].innerHTML.toLowerCase();
            }else {
              val1 = li[i].getElementsByTagName("td")[0].innerHTML;
              val2 = li[i+1].getElementsByTagName("td")[0].innerHTML;
            }

            console.log(val1,val2)
            if (val1 > val2) {
                stop = true;
                break;
            }
        }

        /* If the current item is smaller than 
           the next item then adding it after 
           it using insertBefore() method */
        if (stop) {
            li[i].parentNode.insertBefore(
                li[i + 1], li[i]);
            run = true;
        }
    }
}

let tris = document.querySelector('.tri-select');
if (tris) {
  tris.onchange = function(e){
    e.preventDefault();
    let val = document.querySelector('.tri-select').value;
   sort(parseInt(val));
}
}


let search = document.querySelector(".submitSearch");

if (search ){
  search.addEventListener("click",(e)=>{
    console.log("ss")
    e.preventDefault();
    let li = document.getElementsByTagName("tr");
    let val = document.querySelector(".inputSearch").value
    // Loop traversing through all the list items
    for (i = 1; i < (li.length); i++) {
          let val1 = li[i].getElementsByTagName("th")[0].innerHTML.toLowerCase();
          console.log(val1,"  ",val )
          if (val1.includes(val.toLowerCase())){
            li[i].hidden =  false ;
          }else {
            li[i].hidden = true
          }
          
    }
  })
}
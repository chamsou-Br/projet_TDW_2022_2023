document.querySelector('.search-vits').hidden = true 
document.querySelector('.search-mins').hidden = true 

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
    let div = document.createElement("div");
    let span = document.createElement("span");
    let h5 = document.createElement("h5");
    h5.innerText = val
    // get number of item
    let items = document.querySelectorAll(".vits-item")
    span.innerText =  items.length +1 ;
    div.appendChild(span)
    ingredient_item.appendChild(div)
    ingredient_item.appendChild(h5)
    let ingredient_select = document.querySelector(".search-vits")
    ingredient_select.appendChild(ingredient_item)
    // add input 
    let input = document.createElement('input')
    input.type = "hidden"
    input.value = val
    input.name = "vits[]"
    document.querySelector(".search-vits").appendChild(input)

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
    let div = document.createElement("div");
    let span = document.createElement("span");
    let h5 = document.createElement("h5");
    h5.innerText = val
    // get number of item
    let items = document.querySelectorAll(".mins-item")
    span.innerText =  items.length +1 ;
    div.appendChild(span)
    ingredient_item.appendChild(div)
    ingredient_item.appendChild(h5)
    let ingredient_select = document.querySelector(".search-mins")
    ingredient_select.appendChild(ingredient_item)
    // add input 
    let input = document.createElement('input')
    input.type = "hidden"
    input.value = val
    input.name = "mins[]"
    document.querySelector(".search-mins").appendChild(input)

  })
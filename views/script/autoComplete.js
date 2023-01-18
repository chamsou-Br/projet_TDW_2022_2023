function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  console.log(inp,"ll")
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = ["muscade en poudre",'thon',"salade",'moutarde','concombre',"graines de cardamome","girofle","poire","lait","cafe","sucre glace","the","farine","viande hachee","fromage rapechiche","feuilles de yufka","cumin moulu","piment doux","oignon","coriandre","sel","poivre","oufs ","pain","beurre","vignes","citron","Persil","riz","pignons de pin","bouillon de volaille","huile d'olive","pois ","pommes de terre","courgettes ","cannelle","sardines","ail","poivre rouge doux","poivre noir",'Huile pour friture',"pois chiche","moules","levure","orange","sucre","fleur d'oranger","tomates","menthe","semoule de ble","sucre vanille","margarine","smen","eau","amandes","Miel","arottes","navets","gingembre","raz-el-hanout","paleron de boeuf","citrouille","carottes",'celeri'];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}



let SubmitBtn = document.querySelector(".submitPlus") || document.querySelector(".submitIngredient")  || document.querySelector(".autocomplete-container .submit")  
if (SubmitBtn) {
  SubmitBtn.addEventListener("click",(e)=> {
    e.preventDefault();
    //add child 
    let val =document.querySelector("#myInput").value
    let ingredient_item = document.createElement("div");
    ingredient_item.classList.add('ingredient-item')
    let div = document.createElement("div");
    let span = document.createElement("span");
    let h5 = document.createElement("h5");
    h5.innerText = val
    let i = document.createElement("i");
    i.style = "position : absolute  ;top:-20px;left:-10px"
    i.className =  "bi bi-x-circle ing-close"
    i.addEventListener("click",(e=>{
      i.parentElement.parentNode.removeChild( i.parentElement)
    }))
    // add input 
    let input = document.createElement('input')
    input.type = "hidden"
    input.value = val
    input.name = "ingredient[]"
    // get number of item
    let items = document.querySelectorAll(".ingredient-item")
    span.innerText =  items.length +1 ;
    div.appendChild(span)
    ingredient_item.appendChild(div)
    ingredient_item.appendChild(i);
    ingredient_item.appendChild(h5)
    ingredient_item.appendChild(input)
    // description ingr
    let ingredientdescr = document.querySelector(".ingredientDescr")
    if (ingredientdescr) {
      let input = document.createElement('input')
      input.type = "hidden"
      input.value = ingredientdescr.value
      input.name = "ingrDescr[]"
      ingredient_item.appendChild(input)
      ingredientdescr.value = "";
    }    
    let ingredient_select = document.querySelector(".ingredient-select")
    ingredient_select.appendChild(ingredient_item)
    document.querySelector("#myInput").value  =""


  })

  document.querySelector(".submitInstruction") ? document.querySelector(".submitInstruction").addEventListener('click' , (e)=> {
    e.preventDefault();
        //add child 
        let val =document.querySelector("#instruction").value
        let instr_item = document.createElement("div");
        instr_item.classList.add('etape-item')
        let div = document.createElement("div");
        let span = document.createElement("span");
        let h5 = document.createElement("h5");
        h5.innerText = val
        // add input 
        let input = document.createElement('input')
        input.type = "hidden"
        input.value = val
        input.name = "instruction[]"   
        instr_item.appendChild(input)
        let i = document.createElement("i");
        i.style = "position : absolute  ;top:5px;left:-10px"
        i.className =  "bi bi-x-circle inst-close"
        i.addEventListener("click",(e=>{
          i.parentElement.parentNode.removeChild( i.parentElement)
        }))
        instr_item.appendChild(i);
        // get number of item
        let items = document.querySelectorAll(".etape-item")
        span.innerText =  items.length +1 ;
        div.appendChild(span)
        instr_item.appendChild(div)
        instr_item.appendChild(h5)
        let ingredient_select = document.querySelector(".instruction-select")
        ingredient_select.appendChild(instr_item)
        document.querySelector("#instruction").value  =""

  }) :null
}
let vitsClose = document.querySelectorAll('.ing-close');

if (vitsClose.length> 0) {

  vitsClose.forEach((v,i) => {
    v.addEventListener("click",(e)=> {
      console.log(i,document.querySelectorAll(".ingredient-item")[i])
      e.preventDefault();
      document.querySelectorAll(".ingredient-item")[i].parentNode.removeChild(document.querySelectorAll(".ingredient-item")[i]);
    })
    
  })
}

let minsClose = document.querySelectorAll('.inst-close');

if (minsClose.length> 0) {

  minsClose.forEach((v,i) => {
    v.addEventListener("click",(e)=> {
      console.log(i,document.querySelectorAll(".etape-item")[i])
      e.preventDefault();
      document.querySelectorAll(".etape-item")[i].parentNode.removeChild(document.querySelectorAll(".etape-item")[i]);
    })
    
  })
}

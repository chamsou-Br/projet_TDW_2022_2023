

let filterButtonsFete = document.querySelectorAll(".filter-button-group.fete button");


if (filterButtonsFete.length > 0) {
    filterButtonsFete.forEach((but,index) => {
        but.addEventListener("click",(e) => {
            e.preventDefault();
            let value = but.name ;
            let categorieActive = document.querySelector(".filter-button-group.categorie button.active").name

            document.querySelectorAll(".card").forEach((card) => {
                if ( (index != 0 && card.parentElement.getAttribute("fete") != value) || (categorieActive != "All" && card.parentElement.getAttribute("categorie") != categorieActive)) {
                    card.parentElement.hidden = true
                }else{
                    card.parentElement.hidden = false
                }
            })
            filterButtonsFete.forEach((but2 , index2 )=>{
                if (but2.classList.contains("active")) {
                    but2.classList.remove("active")
                }
            })
            but.classList.add("active")
        })
    })
}




let filterButtonsCategorie = document.querySelectorAll(".filter-button-group.categorie button");


if (filterButtonsCategorie.length> 0){
    filterButtonsCategorie.forEach((but,index) => {
        but.addEventListener("click",(e) => {
            e.preventDefault();
            let value = but.name ;
            let feteActive = document.querySelector(".filter-button-group.fete button.active").name
            document.querySelectorAll(".card").forEach((card) => {
                if ( (index != 0 && card.parentElement.getAttribute("categorie") != value) || (feteActive != "All" && card.parentElement.getAttribute("fete") != feteActive) ) {
                    card.parentElement.hidden = true
                }else{
                    card.parentElement.hidden = false
                }
            })
            filterButtonsCategorie.forEach((but2 , index2 )=>{
                if (but2.classList.contains("active")) {
                    but2.classList.remove("active")
                }
            })
            but.classList.add("active")
        })
    })
}



function sort(id) {
  
    // Declaring Variables
    var geek_list, i, run, li, stop;

    // Taking content of list as input
    geek_list = document.querySelector(".cardsContainer");

    run = true;

    while (run) {
        run = false;
        li = geek_list.getElementsByClassName("cardInfo");

        // Loop traversing through all the list items
        for (i = 0; i < (li.length - 1); i++) {
            stop = false;
            let val1 = li[i].getElementsByTagName("input")[id].value;
            let val2 = li[i+1].getElementsByTagName("input")[id].value;
  
            if ( (id!= 4 && parseInt(val1) > parseInt(val2)) || (id == 4 && parseInt(val1) < parseInt(val2))) {
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

if (document.querySelector('.tri-select')) {
    document.querySelector('.tri-select').onchange = function(e){
        e.preventDefault();
        let val = document.querySelector('.tri-select').value;
       sort(parseInt(val));
    }
}

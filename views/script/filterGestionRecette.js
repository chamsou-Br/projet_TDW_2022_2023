

let filterButtonsFete = document.querySelectorAll(".filter-button-group.fete button");



filterButtonsFete.forEach((but,index) => {
    but.addEventListener("click",(e) => {
        e.preventDefault();
        let value = but.name ;
        let categorieActive = document.querySelector(".filter-button-group.categorie button.active").name
        console.log(categorieActive)
        document.querySelectorAll("tr").forEach((card,iCard) => {
            if (  (iCard != 0 && index != 0   && card.getAttribute("fete") != value ) || (iCard != 0 && categorieActive != "All" && card.getAttribute("categorie") != categorieActive) ) {
                card.hidden = true
            }else{
                card.hidden = false
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



let filterButtonsCategorie = document.querySelectorAll(".filter-button-group.categorie button");



filterButtonsCategorie.forEach((but,index) => {
    but.addEventListener("click",(e) => {
        e.preventDefault();
        let value = but.name ;
        let feteActive = document.querySelector(".filter-button-group.fete button.active").name
        document.querySelectorAll("tr").forEach((card,iCard) => {
            if ((index != 0 && iCard != 0  && card.getAttribute("categorie") != value ) || (iCard != 0 && feteActive != "All" && card.getAttribute("fete") != feteActive) ) {
                card.hidden = true
            }else{
                card.hidden = false
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
            let val1 = li[i].getElementsByTagName("td")[id].innerHTML.toLowerCase().split(" ")[0];
            let val2 = li[i+1].getElementsByTagName("td")[id].innerHTML.toLowerCase().split(" ")[0];
            console.log(parseInt(val1),'  ',parseInt(val2))
            if (parseInt(val1) > parseInt(val2)) {
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

document.querySelector('.tri-select').onchange = function(e){
    e.preventDefault();
    let val = document.querySelector('.tri-select').value;
   sort(parseInt(val)+3);
}
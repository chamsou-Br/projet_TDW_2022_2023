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
            console.log(li[i].getElementsByTagName("td")[id].innerHTML ,i," \n")
            if (li[i].getElementsByTagName("td")[id].innerHTML.toLowerCase() > 
            li[i+1].getElementsByTagName("td")[id].innerHTML.toLowerCase()) {
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

let filterButtons = document.querySelectorAll(".filter-button-group button");
filterButtons.forEach((but,index) => {
    but.addEventListener("click",(e) => {
        e.preventDefault();
        sort(index)
        filterButtons.forEach((but2 , index2 )=>{
            if (but2.classList.contains("active")) {
                but2.classList.remove("active")
            }
        })
        but.classList.add("active")
    })
})
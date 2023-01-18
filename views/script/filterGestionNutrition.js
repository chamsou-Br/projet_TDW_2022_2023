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
                console.log(parseInt(val1),'  ',parseInt(val2),"supp")
                stop = true;
                break;
            }else {
                console.log(parseInt(val1),'  ',parseInt(val2),"inf")
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
   sort(parseInt(val));
}
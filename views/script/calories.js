console.log("first")
let search =  document.querySelector(".searchSubmit")
   search.addEventListener("click",(e) => {
        e.preventDefault();
        let value = document.querySelector("#searchInput").value;
       
        document.querySelectorAll(".card").forEach((card) => {
            console.log(value ,card.parentElement.getAttribute("calories"))
            if (parseInt(card.parentElement.getAttribute("calories")) > parseInt(value) ) {
                console.log(value ,card.parentElement.getAttribute("calories"),false)
                card.parentElement.hidden = true
            }else{
                console.log(value ,card.parentElement.getAttribute("calories"),true)
                card.parentElement.hidden = false
            }
        })
    })
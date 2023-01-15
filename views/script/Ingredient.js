
let search =  document.querySelector(".searchSubmit")
   search.addEventListener("click",(e) => {
        e.preventDefault();
        let value = document.querySelector("#searchInput").value;    
        document.querySelectorAll(".cardIngredient").forEach((card,i) => {
            let valueCard = card.getElementsByClassName("blog-detail")[0].getElementsByTagName("h4")[0].innerText

            if (valueCard.includes(value) ) {
                document.querySelectorAll(".cardIngredient")[i].hidden = false
                
            }else{
                document.querySelectorAll(".cardIngredient")[i].hidden = true

            }
        })
    })
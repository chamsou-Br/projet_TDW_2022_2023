

let filterButtons = document.querySelectorAll(".filter-button-group button");
const initFilter = (value)=> {
    document.querySelectorAll(".card").forEach((card) => {
        if (card.parentElement.getAttribute("fete") != value) {
            card.parentElement.hidden = true
        }else{
            card.parentElement.hidden = false
        }
    })
}

initFilter(filterButtons[0].name)


filterButtons.forEach((but,index) => {
    but.addEventListener("click",(e) => {
        e.preventDefault();
        let value = but.name ;
        document.querySelectorAll(".card").forEach((card) => {
            console.log(card.parentElement.getAttribute("fete"), value);
            if (card.parentElement.getAttribute("fete") != value) {
                card.parentElement.hidden = true
            }else{
                card.parentElement.hidden = false
            }
        })
        filterButtons.forEach((but2 , index2 )=>{
            if (but2.classList.contains("active")) {
                but2.classList.remove("active")
            }
        })
        but.classList.add("active")
    })
})
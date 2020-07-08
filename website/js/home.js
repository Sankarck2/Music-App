document.addEventListener('DOMContentLoaded',()=>{
    let alphabetListDiv = document.querySelectorAll("div")[5];
    let selectedMovieLetter = document.getElementsByClassName('showSelected')
    var divItems = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']
    function createDiv(item) {
        console.log(item)
        let div = document.createElement('div');
        div.className = "alphabet"
        div.innerHTML = item;
        div.onclick = function() {  
		    window.location.href=`index.php?data=alpha&id=${item}`
            selectedMovieLetter.innerHTML = `Tamil ${item} Movie Collection`
        };
        return div
    }

    divItems.map(function (item) {
        alphabetListDiv.appendChild(createDiv(item))
    })
})


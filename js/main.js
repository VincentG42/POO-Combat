let fightElements = document.querySelectorAll('.fight_element');
let fightEnd = document.querySelector('.fight_finish');

let launchFight =document.querySelector('#launch_fight');
let fightBack = document.querySelector('#fight_back');

console.log(fightBack);

launchFight.addEventListener('click',() =>{
    fightElements[0].classList.remove('d-none');
})
let i=1;
fightBack.addEventListener('click', () =>{
    if( i<fightElements.length){
       
        fightElements[i-1].classList.add('d-none');
        fightElements[i].classList.remove('d-none');
        i+=1;
        
    } else if (i >= fightElements.length){
        fightElements[i-1].classList.add('d-none');
        fightEnd.classList.remove('d-none');

    }


    
})





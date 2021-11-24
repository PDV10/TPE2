
let botones_play = document.querySelectorAll(".botones_play");



botones_play.forEach(btn => {
    console.log(btn.dataset.id);
    btn.addEventListener('click',()=>{
        reproducir(btn.dataset.id);

    })
    
});


let botones_pause = document.querySelectorAll(".botones_pause");

botones_pause.forEach(btn => {
    console.log(btn.dataset.id);
    btn.addEventListener('click',()=>{
        pausar(btn.dataset.id);

    })
    
});




// let btn_play = document.getElementById('btn_10');
// btn_play.addEventListener('click',reproducir);


function reproducir(id){

    botones_play.forEach(btn => {
        if (btn.dataset.id == id) {
            btn.classList.add('botones_no');
        }
    });
    

    botones_pause.forEach(btn => {
        if (btn.dataset.id == id) {
            btn.classList.remove('botones_no');
        }
    });

    let audio = document.querySelector('#play'+id);
    audio.play();
    console.log(audio);
}



function pausar(id){

    botones_play.forEach(btn => {
        if (btn.dataset.id == id) {
            btn.classList.remove('botones_no');
        }
    });

    botones_pause.forEach(btn => {
        if (btn.dataset.id == id) {
            btn.classList.add('botones_no');
        }
    });

    let audio = document.querySelector('#play'+id);
    audio.pause();
    console.log(audio);
}
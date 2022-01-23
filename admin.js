document.addEventListener("DOMContentLoaded", function(a){

    anime({targets: '#modal, #modal-bg', opacity: ['0%','100%'], duration: 500, easing: 'linear'});

    document.getElementById('modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#modal, #modal-bg', opacity: ['100%','0%'], duration: 500, easing: 'linear', complete: function(){

            document.getElementById('modal-bg').style.display = 'none';
        }});
    });
});
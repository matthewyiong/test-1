
    
let _directiom=true;
let _move=()=>{
    let lists = document.querySelectorAll('.img-item');
    if(_directiom){
        document.querySelector('#img-container').appendChild(lists[0])
    }else{
        document.querySelector('#img-container').prepend(lists[lists.length - 1])}
    
}
let timer = setInterval(_move,5000);
document.querySelector('.select-container').addEventListener('mouseover',()=>{
    clearInterval(timer);
});
document.querySelector('.select-container').addEventListener('mouseout',()=>{
    timer = setInterval(_move,5000);
});

document.querySelectorAll('.s-button')[1].onclick =()=>{
    _directiom=true;
    _move()};
    
document.querySelectorAll('.s-button')[0].onclick =()=>{
    _directiom=false;
    _move()};


let login=document.getElementById('login');
let loginValue=0;
login.addEventListener('click',()=>{
    if(loginValue==0){
        window.location.href='../html/login copy.php'
    }
})

function loginStatus(value){
    loginValue=value;
}

document.querySelector('.card-number-input').oninput = () =>{
    document.querySelector('.card-number-box').innerHTML = document.
    querySelector('.card-number-input').value;
}

document.querySelector('.card-holder-input').oninput = () =>{
    document.querySelector('.card-holder-name').innerHTML = document.
    querySelector('.card-holder-input').value;
}

document.querySelector('.month-input').oninput = () =>{
    document.querySelector('.exp-month').innerHTML = document.
    querySelector('.month-input').value;
}
document.querySelector('.year-input').oninput = () =>{
    document.querySelector('.exp-year').innerHTML = document.
    querySelector('.year-input').value;
}

document.querySelector('.cvv-input').onmouseenter = () =>{
    document.querySelector('.FrontPageContent').style.transform = 'perspective(600px) rotateY(-180deg)';
    document.querySelector('.back').style.transform = 'perspective(600px) rotateY(0deg)';
}

document.querySelector('.cvv-input').onmouseleave = () =>{
    document.querySelector('.FrontPageContent').style.transform = 'perspective(600px) rotateY(0deg)';
    document.querySelector('.back').style.transform = 'perspective(600px) rotateY(180deg)';
}




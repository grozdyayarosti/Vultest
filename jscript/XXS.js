const description = document.getElementById("description");
description.onclick = () =>{
    const signBox = document.getElementById('description_sign');
    description.classList.toggle('triangle_down');
    signBox.classList.toggle('sign_active');
};

const instruction = document.getElementById("instruction");
instruction.onclick = () =>{
    const signBox = document.getElementById('instruction_sign');
    instruction.classList.toggle('triangle_down');
    signBox.classList.toggle('sign_active');
}

const btn = document.getElementById('add_count');
btn.onclick = ()=>{
    document.getElementById('add_table').action='handlers/XSSFillHandler.php'
}
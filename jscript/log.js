const btn = document.querySelector("button");

const error = (input) => {
    input.classList.add('error_input');
    input.value = '';
    input.placeholder = 'Ошибка';
}

btn.onclick = () => {
    const inputs = document.querySelectorAll("input");
    let reg;
    let logic = true;
    inputs.forEach((input) => {
        switch (input.id) {
            case 'login':
                reg = /^[a-zA-Z0-9_.]{1,20}$/;
                if (!reg.test(input.value) || input.value === '') {
                    logic = false;
                    error(input);
                }
                break;
            case 'pass':
                alert(input.value);
                reg = /^[a-zA-Z0-9_.]{1,20}$/;
                if (!reg.test(input.value) || input.value === '') {
                    logic = false;
                    error(input);
                }
                break;
            default:
                return;
        }
    })
    if (logic) {
        document.forms[0].action = 'handlers/loginHandler.php';
    }
}

const inputs = document.querySelectorAll('input');

inputs.forEach((input) => {
    input.onfocus = (e) => {
        e.target.classList.remove('error_input');
    }
})
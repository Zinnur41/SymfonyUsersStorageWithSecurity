window.onload=function() {
    const submitButton = document.getElementsByName('submit')[0];
    const password = document.getElementsByName('password')[0];
    const repeatPassword = document.getElementsByName('repeatPassword')[0];

    submitButton.addEventListener('click', (event) => {
        if (password.value !== repeatPassword.value) {
            event.preventDefault();
            alert('Пароли не совпадают!');
            password.value = '';
            repeatPassword.value = '';
        } else {
            alert('Вы успешно зарегистрированы!');
        }
    })
}
window.onload=function() {
    const submitButton = document.getElementsByName('registration[submit]')[0];
    const password = document.getElementsByName('registration[password]')[0];
    const repeatPassword = document.getElementsByName('registration[repeatPassword]')[0];

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
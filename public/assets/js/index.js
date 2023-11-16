window.onload=function() {
    const submitButton = document.getElementsByName('form[submit]')[0];
    const password = document.getElementsByName('form[password]')[0];
    const repeatPassword = document.getElementsByName('form[repeatPassword]')[0];

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
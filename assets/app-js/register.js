/**
 * This JavaScript files takes care of the login of users
 * it receives the user username address as the username and then password, validates and sends it to the endpoint
 */

document.addEventListener("DOMContentLoaded", () => {
    var baseURL = location.origin.indexOf('.com') > -1 ? location.origin : location.origin + '/ntask'
    var url = baseURL + '/register/process'
    var loginButton = document.querySelector('#submitBtn')
    var errorDOM = document.querySelector('#lerror_login')
    loginButton.onclick = (e) => {
        console.log(e)
        e.preventDefault()
        let fullname = document.querySelector('#fullname')
        let username = document.querySelector('#username')
        let email = document.querySelector('#email')
        let password = document.querySelector('#password')
        let role = document.querySelector('#role')
        fullname = fullname && fullname.value
        username = username && username.value
        email = email && email.value
        password = password && password.value
        role = role && role.value
        //regext to validate username         
        var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

        if (fullname === '' || fullname.length < 2) {
            return errorDOM.textContent = 'Please put in a valid fullname';
        }
        //check if username is submitted
        if (username === '') {
            return errorDOM.textContent = 'Please put in a username';
        }
        //check if email is submitted
        if (email === '' || !re.test(email)) {
            return errorDOM.textContent = 'Please put in a valid email';
        }
        if (password === '' || password.length < 4) {
            return errorDOM.textContent = 'Please put in a valid password';
        }
        if (role === '') {
            return errorDOM.textContent = 'Please select a role';
        }
        errorDOM.textContent = ''
        //object to be sent to the endpoint
        let sendData = {
            fullname: fullname, username: username, email: email, password: password, role: role
        }
        loginButton.textContent = 'Loading...'
        fetch(url, {
            method: 'POST',
            body: JSON.stringify(sendData)
        }).then(res => res.json()).then(data => {
            loginButton.textContent = 'Submit'
            if (data.status === 'error') {
                return errorDOM.textContent = data.message
            }
            if (data.status === 'success') {
                //  return successDOM.textContent = data.success
                errorDOM.textContent = data.message
                setTimeout(() => {
                    location.href = 'home'
                }, 3000);

            } else {

                return errorDOM.textContent = 'Could not login'
            }
        }).catch(e => {
            console.log(e)
            return errorDOM.textContent = 'Could not connect to the server'

        })
    }
})

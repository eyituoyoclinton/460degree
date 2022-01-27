/**
 * This JavaScript files takes care of the login of users
 * it receives the user username address as the username and then password, validates and sends it to the endpoint
 */

document.addEventListener("DOMContentLoaded", () => {
    var baseURL = location.origin.indexOf('.com') > -1 ? location.origin : location.origin + '/ntask'
    var url = baseURL + '/login/process'
    var loginButton = document.querySelector('#submitBtn')
    var errorDOM = document.querySelector('#lerror_login')
    loginButton.onclick = (e) => {
        console.log(e)
        e.preventDefault()
        var username = document.querySelector('#username').value
        var password = document.querySelector('#password').value
        username = username && username.trim()
        password = password && password.trim()
        //regext to validate username         
        var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        //check if username is submitted
        if (username === '') {
            return errorDOM.textContent = 'Please put in a username';
        }
        //check if password is submitted
        if (password === '') {
            return errorDOM.textContent = 'Please put in a password';
        }
        errorDOM.textContent = ''
        //object to be sent to the endpoint
        let sendData = {
            username: username,
            password: password
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
                location.href = 'home'
            } else {

                return errorDOM.textContent = 'Could not login'
            }
        }).catch(e => {
            console.log(e)
            return errorDOM.textContent = 'Could not connect to the server'

        })
    }
})

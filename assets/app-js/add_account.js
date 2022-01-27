$(document).ready(() => {
    $('.add_account_click').on('click', (e) => {
        e.preventDefault()
        var btn = document.querySelector('.add_account_click')
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
        var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        //check if fullname is submitted
        if (fullname === '' || fullname.length < 2) {
            return showError('Please put in a valid fullname');
        }
        //check if username is submitted
        if (username === '') {
            return showError('Please put in a username');
        }
        //check if email is submitted
        if (email === '' || !re.test(email)) {
            return showError('Please put in a valid email');
        }
        if (password === '' || password.length < 4) {
            return showError('Please put in a valid password');
        }
        if (role === '') {
            return showError('Please select a role');
        }

        showError("Processing please wait.....")
        btn.textContent = 'Processing..'
        $.ajax({
            method: 'POST',
            url: baseURL + '/users/add',
            data: { fullname: fullname, username: username, email: email, password: password, role: role }
        }).done(e => {
            if (e.status === 'success') {
                btn.textContent = 'Add user'
                showSuccess(e.message)
                setTimeout(e => {
                    location.reload()
                }, 1200)
            } else {
                btn.textContent = 'Add user'
                showError(e.message)
            }
        }).fail(e => {
            btn.textContent = 'Add user'
            console.log(e)
            showError("Unknow Occured")
        })
    })
    $('.update_account_click').on('click', (e) => {
        e.preventDefault()
        var btn = document.querySelector('.update_account_click')
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
        var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        //check if fullname is submitted
        if (fullname === '' || fullname.length < 2) {
            return showError('Please put in a valid fullname');
        }
        //check if username is submitted
        if (username === '') {
            return showError('Please put in a username');
        }
        //check if email is submitted
        if (email === '' || !re.test(email)) {
            return showError('Please put in a valid email');
        }
        if (password === '' || password.length < 4) {
            return showError('Please put in a valid password');
        }
        if (role === '') {
            return showError('Please select a role');
        }

        showError("Processing please wait.....")
        btn.textContent = 'Processing..'
        $.ajax({
            method: 'POST',
            url: baseURL + '/users/update',
            data: { fullname: fullname, username: username, email: email, password: password, role: role }
        }).done(e => {
            if (e.status === 'success') {
                btn.textContent = 'Add user'
                showSuccess(e.message)
                setTimeout(e => {
                    location.reload()
                }, 1200)
            } else {
                btn.textContent = 'Add user'
                showError(e.message)
            }
        }).fail(e => {
            btn.textContent = 'Add user'
            console.log(e)
            showError("Unknow Occured")
        })
    })

    $('.delete_click').on('click', (e) => {
        let id = e.currentTarget.getAttribute('data-id');
        let btn = document.getElementById('delete' + id)

        if (!id || isNaN(id)) {
            return showError("Product data could not be captured")
        }
        if (confirm("Are you sure you want to delete this transaction?")) {
            showError("Processing please wait.....")
            btn.textContent = 'Processing..'
            $.ajax({
                method: 'POST',
                url: baseURL + '/users/delete',
                data: { id }
            }).done(e => {
                if (e.status === 'success') {
                    btn.textContent = 'Delete'
                    showSuccess(e.message)
                    setTimeout(e => {
                        location.reload()
                    }, 1200)
                } else {
                    btn.textContent = 'Delete'
                    showError(e.message)
                }
            }).fail(e => {
                btn.textContent = 'Delete'
                console.log(e)
                showError("Unknow Occured")
            })
        }
    })

})

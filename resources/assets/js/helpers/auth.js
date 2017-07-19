function login() {
	
}

function logout() {
	axios.post('/logout')
	.then(function(response){
		console.log(response.data);
        var authInfo = JSON.stringify(response.data);
        window.localStorage.setItem('user', authInfo);
        console.log(window.localStorage.getItem('user'));
	});
}

export {login, logout}
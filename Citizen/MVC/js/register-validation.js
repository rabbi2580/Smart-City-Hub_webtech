document.addEventListener("DOMContentLoaded",function(){
    const form =document.getElementById('registerForm');
    const password= document.getElementById("password");
    const confirmPassword =document.getElementById('confirm_password');
    form.addEventListener('submit',function(a){
        if(password.value!==confirmPassword.value){
            e.preventDefault();
            alert("Password not matched");
            return;
        }
        if(password.value.length<8){
            e.preventDefault();
            alert('Password must be at least 8 char')
            return;
        }
        const phone=document.querySelector('input[name="phone"]');
        if(!/^\d{11}$/.test(phone.value)){
            e.preventDefault();
            alert("Phone number must be 11 digit")
            return;
        }

    });
});
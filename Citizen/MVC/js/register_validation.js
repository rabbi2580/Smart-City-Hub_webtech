document.addEventListener("DOMContentLoaded",function(){
    const form =document.querySelector('form');
    const password= document.querySelector('input[name="password"]');
    const confirmPassword =document.querySelector('input[name="confirm_password"]');
    const phone = document.querySelector('input[name="phone"]');
    form.addEventListener('submit',function(e){
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
        const phoneValue=phone.value.replace(/\D/g,'');
        if(phoneValue.length!==11){
            e.preventDefault();
            alert("Phone number must be 11 digit");
            phone.focus();
            return;
        }

    });
});
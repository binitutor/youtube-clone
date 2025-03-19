
const profile_pic = document.getElementById('profile_pic');
const profile_pic_preview = document.getElementById('profile_pic_preview');
const profile_pic_label = document.getElementById('profile_pic_label');
// const profile_form_inputs = document.querySelectorAll('.pp-form');
// const profile_form_status = document.getElementById('pp-form-status');

profile_pic.addEventListener('change', function(){

    const file = this.files[0];
    
    if(file){
        const reader = new FileReader();

        // reveal preview
        profile_pic_preview.removeAttribute('hidden');
        profile_pic_preview.src = URL.createObjectURL(file);


        profile_pic_label.innerHTML = file.name;
        // reader.onload = function(){
        //     const result = reader.result;
        //     profile_pic_preview.src = result;
        // }
        // reader.readAsDataURL(file);
    }
}
);



function upload_profile(){
    // trigger file input
    document.getElementById('profile_pic').click();
}

function view_password(){
    var pw1 = document.getElementById('InputPassword');
    var pw2 = document.getElementById('InputPassword2');
    pwInputType = pw1.getAttribute('type');
    if (pwInputType === 'password') {
        pw1.removeAttribute('type');
        pw2.removeAttribute('type');
        pw1.setAttribute('type', 'text');
        pw2.setAttribute('type', 'text');
    } else {
        pw1.removeAttribute('type');
        pw2.removeAttribute('type');
        pw1.setAttribute('type', 'password');
        pw2.setAttribute('type', 'password');
    }

    // const userEmailInput = document.getElementById("loginInputEmail");
    // const passwordInput = document.getElementById("loginInputPassword");
    // const toggleVisibility = document.getElementById("toggleVisibility");

    //     // profile_panel = document.getElementById('profile_panel')
    //     // panel = generic_profile()
    //     // profile_panel.innerHTML = panel.innerHTML
        

    // toggleVisibility.addEventListener("change", function() {
    //         if (toggleVisibility.checked) {
    //             passwordInput.type = "text";
    //         } else {
    //             passwordInput.type = "password";
    //         }
    // });
}


// function check_success(){
//     if( profile_form_status.value == 'true'){
//         // hide inputs
//         profile_form_inputs.forEach(inputElement => {
//             inputElement.setAttribute('hidden', true);
//         });
//     }
// }

// function hide_profile_inputs(){
//     profile_form_inputs.forEach(inputElement => {
//         inputElement.setAttribute('hidden', true);
//     });
// }
// document.getElementById("pp-form-status").innerHTML = "true";

// array.forEach(element => {
    
// });
// for each element in the array, do something
// array.forEach(element => {

// });

// refresh page after 3 seconds
                                                    // setTimeout(function(){
                                                    //     location.reload();
                                                    // }, 3000);



// clear browser cache
// window.location.reload(true);



// window.onkeydown = function(event) {
//     if (event.keyCode == 32) {
//         //your function here
//     };
// };

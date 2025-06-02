<x-html title="Entrar | WikiJapi">

    <section id="auth" class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-center align-items-center flex-column w-100 h-100">

            <div class="login-form d-flex justify-content-center align-items-center flex-column">
                <div class="mb-5 d-flex justify-content-center align-items-center">
                    <a href="{{route('home')}}" class="d-flex justify-content-center align-items-center" style="margin-top: -50px; width: 14rem">
                        <img class="w-100" src="{{asset('assets/img/logo.png')}}" alt="">
                    </a>
                </div>
    
                <x-login/>
                
                <x-sign-up/>
            </div>

        </div>

        <div class="right-img h-100 p-0 position-relative">
            <div class="overlay w-100 h-100 z-1 position-absolute" style="background: rgba(54, 54, 54, 0.3)"></div>
            <div class="cachoeira"></div>
        </div>

    </section>

    <script>
        /* Auth Page */
        const loginForm = document.querySelector("#login-form");
        const signUpForm = document.querySelector("#sign-up-form");
        const loginBtn = document.querySelector("#login");
        const signUpBtn = document.querySelector("#sign-up");
        const specialistInputs = document.querySelector("#specialist-inputs");
        const roleRadioInputs = document.querySelectorAll("input[name='role']");

        signUpBtn.addEventListener("click", function (e){
            e.preventDefault();
            loginForm.classList.toggle("d-none");
            signUpForm.classList.toggle("d-none");
        });

        loginBtn.addEventListener("click", function (e){
            e.preventDefault();
            loginForm.classList.toggle("d-none");
            signUpForm.classList.toggle("d-none");
        });

        roleRadioInputs.forEach((input) => {
            input.addEventListener("change", function () {
                if (this.value === "specialist") {
                    specialistInputs.classList.remove("d-none");
                } else {
                    specialistInputs.classList.add("d-none");
                }
            });
        });
    </script>
</x-html>
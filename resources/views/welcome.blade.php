<x-layouts.app :title="'Профучёт'">
    <div class="text-white min-h-screen flex flex-column text-center justify-center items-center">
        <div class="w-1/4">
            <div class="text-4xl font-bold flex justify-center items-center">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 48 48" fill="none">
                        <path
                            d="M17 23.5C20.3137 23.5 23 20.8137 23 17.5C23 14.1863 20.3137 11.5 17 11.5C13.6863 11.5 11 14.1863 11 17.5C11 20.8137 13.6863 23.5 17 23.5Z"
                            fill="white"/>
                        <path d="M7 34.5C7 29 11.5 24.5 17 24.5C22.5 24.5 27 29 27 34.5V36.5H7V34.5Z" fill="white"/>
                        <path
                            d="M39 16.5H31C29.8954 16.5 29 17.3954 29 18.5V26.5C29 27.6046 29.8954 28.5 31 28.5H39C40.1046 28.5 41 27.6046 41 26.5V18.5C41 17.3954 40.1046 16.5 39 16.5Z"
                            fill="white"/>
                        <path d="M32 22.5L34 24.5L38 19.5" stroke="#005BBB" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </div>
                ПрофУчёт
            </div>
            <div class="text-sm pb-6">Авторизация в системе</div>
            <div class="text-center bg-kpfu-blue rounded-xl px-4 pt-4 py-2 text-left text-xl">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="my-4">
                        <div class="">
                            <label for="email">Email</label>
                        </div>
                        <input type="email" class="w-full bg-white text-black rounded px-1" name="email" id="email"
                               required>
                    </div>
                    <div class="my-4">
                        <div class="">
                            <label for="password">Пароль</label>
                        </div>
                        <input type="password" class="w-full bg-white text-black rounded px-1" name="password"
                               id="password" required>
                    </div>
                    <div class="w-full p-2 text-center">
                        <button type="submit" id="loginButton"
                                class="bg-white text-black px-4 py-1 cursor-pointer rounded opacity-0 translate-y-2 transition-all duration-300 ease-out">
                            Вход
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const loginButton = document.getElementById('loginButton');

            function checkInputs() {
                if (emailInput.value.trim() !== '' && passwordInput.value.trim() !== '') {
                    // Показываем кнопку с анимацией
                    loginButton.classList.remove('opacity-0', 'translate-y-2');
                    loginButton.classList.add('opacity-100', 'translate-y-0');
                } else {
                    // Скрываем кнопку с анимацией
                    loginButton.classList.remove('opacity-100', 'translate-y-0');
                    loginButton.classList.add('opacity-0', 'translate-y-2');
                }
            }

            emailInput.addEventListener('input', checkInputs);
            passwordInput.addEventListener('input', checkInputs);

            // Проверить сразу при загрузке (на случай автозаполнения)
            checkInputs();
        });
    </script>
</x-layouts.app>

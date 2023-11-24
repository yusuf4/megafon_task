<template>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">
                Megafon Tajikistan
            </h1>

            <form
                action=""
                class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8"
            >
                <p class="text-center text-lg font-medium">Войдте в свой аккаунт</p>

                <div>
                    <label for="email" class="sr-only">Email</label>

                    <div class="relative">
                        <input
                            type="email"
                            class="w-full rounded-lg border-gray-200 p-3 pe-12 text-sm shadow-sm"
                            placeholder="Enter email"
                            id="email"
                        />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                              />
                            </svg>
                        </span>
                    </div>
                </div>

                <div>
                    <label for="password" class="sr-only">Password</label>

                    <div class="relative">
                        <input
                            type="password"
                            class="w-full rounded-lg border-gray-200 p-3 pe-12 text-sm shadow-sm"
                            placeholder="Enter password"
                            id="password"
                        />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="2"
                                 stroke="currentColor"
                                 class="w-4 h-4 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>

                        </span>
                    </div>
                </div>

                <button
                    type="submit"
                    class="block w-full rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white"
                >
                    Вход
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login"
}
</script>

<x-guest-layout>



    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-6">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">Welcome to the Game!
                            </h1>
                            <p class="mt-2 text-sm text-gray-600">This game is in beta testing and we'd really appreciate
                                it if you help us out. The name of the game is to join a team with your friends or
                                against your friends and log your activity points as you explore the convention.</p>
                            <p class="mt-2 text-sm text-gray-600">As you explore the convention area you might see some
                                signs with QR codes that look like
                                this:
                            </p>
                            <p class="mt-2 text-sm text-gray-600">After you've created an account you can log the visit
                                by scanning the QR code with your
                                smart phone camera and visiting the website (CAREFUL! There might be shifty foxes out
                                there swapping codes, the website should look like
                                https://beta.event-dev.com/log/1). You'll see a big green
                                indicator saying it worked or a red one saying you already logged that activity. That's
                                all you have to do!</p>

                            <p class="mt-2 text-sm text-gray-600">Currently there is no prize for the winning team, big
                                sad 🙁 , but we're hoping to get
                                this out for other conventions to use and maybe they'll have a prize for the winners!
                            </p>
                            <br>
                            <p class="mt-2 text-sm text-gray-600">Any help testing this application is super duper
                                helpful and we who wrote this are very
                                grateful ❤️ ❤️</p>
                            <p class="mt-2 text-sm text-gray-600"> Questions, concerns, or bugs can be reported to the
                                <a class="text-blue-600" href="https://t.me/event_dev_ops">Telegram Event Dev Ops
                                    group</a>
                            </p>
                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                    <a href="{{ route('register') }}"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">
                                        Join the Game!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>

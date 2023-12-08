<x-default-layout>
    <section class="bg-white md:pb-20 overflow-hidden relative z-10 md:px-14">
        <div class="container">
            <div class="flex flex-wrap lg:justify-between -mx-4">
                <div class="w-full lg:w-1/2 xl:w-6/12 px-4">
                    <div class="max-w-[570px] mb-12 lg:mb-0">
                        <span class="block mb-4 text-base text-blue-600 font-semibold">
                            Contactez nous
                        </span>
                        <h2
                            class="
                      text-dark
                      mb-6
                      uppercase
                      font-bold
                      text-[32px]
                      sm:text-[40px]
                      lg:text-[36px]
                      xl:text-[40px]
                      ">
                            PRENEZ CONTACT AVEC NOUS
                        </h2>
                        <p class="text-base text-body-color leading-relaxed mb-9">
                            Nous vous invitons chaleureusement à prendre contact avec nous. Votre communication est
                            importante pour nous, que ce soit pour répondre à vos questions, discuter de vos besoins ou
                            explorer de nouvelles opportunités. Notre équipe est prête à vous écouter et à vous
                            assister. N'hésitez pas à nous contacter dès aujourd'hui pour entamer une conversation
                            fructueuse. Vos idées et vos besoins nous tiennent à cœur, et nous sommes là pour vous
                            accompagner
                        </p>

                    </div>
                </div>
                <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
                    <div class="bg-white relative rounded-lg p-8 sm:p-12 shadow-lg">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <input type="text" placeholder="Nom" name="nom"
                                    class="
                            w-full
                            rounded
                            py-3
                            px-[14px]
                            text-body-color text-base
                            border border-[f0f0f0]
                            outline-none
                            focus-visible:shadow-none
                            focus:border-blue-600
                            " />
                            </div>
                            <div class="mb-6">
                                <input type="text" placeholder="Prénom" name="prenom"
                                    class="
                            w-full
                            rounded
                            py-3
                            px-[14px]
                            text-body-color text-base
                            border border-[f0f0f0]
                            outline-none
                            focus-visible:shadow-none
                            focus:border-blue-600
                            " />
                            </div>
                            <div class="mb-6">
                                <input type="email" placeholder="Email" name="email"
                                    class="
                            w-full
                            rounded
                            py-3
                            px-[14px]
                            text-body-color text-base
                            border border-[f0f0f0]
                            outline-none
                            focus-visible:shadow-none
                            focus:border-blue-600
                            " />
                            </div>
                            <div class="mb-6">
                                <textarea rows="6" placeholder="Votre Message" name="message"
                                    class="
                            w-full
                            rounded
                            py-3
                            px-[14px]
                            text-body-color text-base
                            border border-[f0f0f0]
                            resize-none
                            outline-none
                            focus-visible:shadow-none
                            focus:border-blue-600
                            "></textarea>
                            </div>
                            <div>
                                <button type="submit"
                                    class="
                            w-full
                            text-white
                            bg-blue-600
                            rounded
                            border border-blue-600
                            p-3
                            transition
                            hover:bg-opacity-90
                            ">
                                    Envoyer le Message
                                </button>
                            </div>
                        </form>
                        <div>
                            <span class="absolute -top-10 -right-9 z-[-1]">
                                <svg width="100" height="100" viewBox="0 0 100 100" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 100C0 44.7715 0 0 0 0C55.2285 0 100 44.7715 100 100C100 100 100 100 0 100Z"
                                        fill="#3056D3" />
                                </svg>
                            </span>
                            <span class="absolute -right-10 top-[90px] z-[-1]">
                                <svg width="34" height="134" viewBox="0 0 34 134" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="31.9993" cy="132" r="1.66667"
                                        transform="rotate(180 31.9993 132)" fill="#13C296" />
                                    <circle cx="31.9993" cy="117.333" r="1.66667"
                                        transform="rotate(180 31.9993 117.333)" fill="#13C296" />
                                    <circle cx="31.9993" cy="102.667" r="1.66667"
                                        transform="rotate(180 31.9993 102.667)" fill="#13C296" />
                                    <circle cx="31.9993" cy="88" r="1.66667" transform="rotate(180 31.9993 88)"
                                        fill="#13C296" />
                                    <circle cx="31.9993" cy="73.3333" r="1.66667"
                                        transform="rotate(180 31.9993 73.3333)" fill="#13C296" />
                                    <circle cx="31.9993" cy="45" r="1.66667" transform="rotate(180 31.9993 45)"
                                        fill="#13C296" />
                                    <circle cx="31.9993" cy="16" r="1.66667" transform="rotate(180 31.9993 16)"
                                        fill="#13C296" />
                                    <circle cx="31.9993" cy="59" r="1.66667" transform="rotate(180 31.9993 59)"
                                        fill="#13C296" />
                                    <circle cx="31.9993" cy="30.6666" r="1.66667"
                                        transform="rotate(180 31.9993 30.6666)" fill="#13C296" />
                                    <circle cx="31.9993" cy="1.66665" r="1.66667"
                                        transform="rotate(180 31.9993 1.66665)" fill="#13C296" />
                                    <circle cx="17.3333" cy="132" r="1.66667"
                                        transform="rotate(180 17.3333 132)" fill="#13C296" />
                                    <circle cx="17.3333" cy="117.333" r="1.66667"
                                        transform="rotate(180 17.3333 117.333)" fill="#13C296" />
                                    <circle cx="17.3333" cy="102.667" r="1.66667"
                                        transform="rotate(180 17.3333 102.667)" fill="#13C296" />
                                    <circle cx="17.3333" cy="88" r="1.66667"
                                        transform="rotate(180 17.3333 88)" fill="#13C296" />
                                    <circle cx="17.3333" cy="73.3333" r="1.66667"
                                        transform="rotate(180 17.3333 73.3333)" fill="#13C296" />
                                    <circle cx="17.3333" cy="45" r="1.66667"
                                        transform="rotate(180 17.3333 45)" fill="#13C296" />
                                    <circle cx="17.3333" cy="16" r="1.66667"
                                        transform="rotate(180 17.3333 16)" fill="#13C296" />
                                    <circle cx="17.3333" cy="59" r="1.66667"
                                        transform="rotate(180 17.3333 59)" fill="#13C296" />
                                    <circle cx="17.3333" cy="30.6666" r="1.66667"
                                        transform="rotate(180 17.3333 30.6666)" fill="#13C296" />
                                    <circle cx="17.3333" cy="1.66665" r="1.66667"
                                        transform="rotate(180 17.3333 1.66665)" fill="#13C296" />
                                    <circle cx="2.66536" cy="132" r="1.66667"
                                        transform="rotate(180 2.66536 132)" fill="#13C296" />
                                    <circle cx="2.66536" cy="117.333" r="1.66667"
                                        transform="rotate(180 2.66536 117.333)" fill="#13C296" />
                                    <circle cx="2.66536" cy="102.667" r="1.66667"
                                        transform="rotate(180 2.66536 102.667)" fill="#13C296" />
                                    <circle cx="2.66536" cy="88" r="1.66667"
                                        transform="rotate(180 2.66536 88)" fill="#13C296" />
                                    <circle cx="2.66536" cy="73.3333" r="1.66667"
                                        transform="rotate(180 2.66536 73.3333)" fill="#13C296" />
                                    <circle cx="2.66536" cy="45" r="1.66667"
                                        transform="rotate(180 2.66536 45)" fill="#13C296" />
                                    <circle cx="2.66536" cy="16" r="1.66667"
                                        transform="rotate(180 2.66536 16)" fill="#13C296" />
                                    <circle cx="2.66536" cy="59" r="1.66667"
                                        transform="rotate(180 2.66536 59)" fill="#13C296" />
                                    <circle cx="2.66536" cy="30.6666" r="1.66667"
                                        transform="rotate(180 2.66536 30.6666)" fill="#13C296" />
                                    <circle cx="2.66536" cy="1.66665" r="1.66667"
                                        transform="rotate(180 2.66536 1.66665)" fill="#13C296" />
                                </svg>
                            </span>
                            <span class="absolute -left-7 -bottom-7 z-[-1]">
                                <svg width="107" height="134" viewBox="0 0 107 134" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="104.999" cy="132" r="1.66667"
                                        transform="rotate(180 104.999 132)" fill="#13C296" />
                                    <circle cx="104.999" cy="117.333" r="1.66667"
                                        transform="rotate(180 104.999 117.333)" fill="#13C296" />
                                    <circle cx="104.999" cy="102.667" r="1.66667"
                                        transform="rotate(180 104.999 102.667)" fill="#13C296" />
                                    <circle cx="104.999" cy="88" r="1.66667"
                                        transform="rotate(180 104.999 88)" fill="#13C296" />
                                    <circle cx="104.999" cy="73.3333" r="1.66667"
                                        transform="rotate(180 104.999 73.3333)" fill="#13C296" />
                                    <circle cx="104.999" cy="45" r="1.66667"
                                        transform="rotate(180 104.999 45)" fill="#13C296" />
                                    <circle cx="104.999" cy="16" r="1.66667"
                                        transform="rotate(180 104.999 16)" fill="#13C296" />
                                    <circle cx="104.999" cy="59" r="1.66667"
                                        transform="rotate(180 104.999 59)" fill="#13C296" />
                                    <circle cx="104.999" cy="30.6666" r="1.66667"
                                        transform="rotate(180 104.999 30.6666)" fill="#13C296" />
                                    <circle cx="104.999" cy="1.66665" r="1.66667"
                                        transform="rotate(180 104.999 1.66665)" fill="#13C296" />
                                    <circle cx="90.3333" cy="132" r="1.66667"
                                        transform="rotate(180 90.3333 132)" fill="#13C296" />
                                    <circle cx="90.3333" cy="117.333" r="1.66667"
                                        transform="rotate(180 90.3333 117.333)" fill="#13C296" />
                                    <circle cx="90.3333" cy="102.667" r="1.66667"
                                        transform="rotate(180 90.3333 102.667)" fill="#13C296" />
                                    <circle cx="90.3333" cy="88" r="1.66667"
                                        transform="rotate(180 90.3333 88)" fill="#13C296" />
                                    <circle cx="90.3333" cy="73.3333" r="1.66667"
                                        transform="rotate(180 90.3333 73.3333)" fill="#13C296" />
                                    <circle cx="90.3333" cy="45" r="1.66667"
                                        transform="rotate(180 90.3333 45)" fill="#13C296" />
                                    <circle cx="90.3333" cy="16" r="1.66667"
                                        transform="rotate(180 90.3333 16)" fill="#13C296" />
                                    <circle cx="90.3333" cy="59" r="1.66667"
                                        transform="rotate(180 90.3333 59)" fill="#13C296" />
                                    <circle cx="90.3333" cy="30.6666" r="1.66667"
                                        transform="rotate(180 90.3333 30.6666)" fill="#13C296" />
                                    <circle cx="90.3333" cy="1.66665" r="1.66667"
                                        transform="rotate(180 90.3333 1.66665)" fill="#13C296" />
                                    <circle cx="75.6654" cy="132" r="1.66667"
                                        transform="rotate(180 75.6654 132)" fill="#13C296" />
                                    <circle cx="31.9993" cy="132" r="1.66667"
                                        transform="rotate(180 31.9993 132)" fill="#13C296" />
                                    <circle cx="75.6654" cy="117.333" r="1.66667"
                                        transform="rotate(180 75.6654 117.333)" fill="#13C296" />
                                    <circle cx="31.9993" cy="117.333" r="1.66667"
                                        transform="rotate(180 31.9993 117.333)" fill="#13C296" />
                                    <circle cx="75.6654" cy="102.667" r="1.66667"
                                        transform="rotate(180 75.6654 102.667)" fill="#13C296" />
                                    <circle cx="31.9993" cy="102.667" r="1.66667"
                                        transform="rotate(180 31.9993 102.667)" fill="#13C296" />
                                    <circle cx="75.6654" cy="88" r="1.66667"
                                        transform="rotate(180 75.6654 88)" fill="#13C296" />
                                    <circle cx="31.9993" cy="88" r="1.66667"
                                        transform="rotate(180 31.9993 88)" fill="#13C296" />
                                    <circle cx="75.6654" cy="73.3333" r="1.66667"
                                        transform="rotate(180 75.6654 73.3333)" fill="#13C296" />
                                    <circle cx="31.9993" cy="73.3333" r="1.66667"
                                        transform="rotate(180 31.9993 73.3333)" fill="#13C296" />
                                    <circle cx="75.6654" cy="45" r="1.66667"
                                        transform="rotate(180 75.6654 45)" fill="#13C296" />
                                    <circle cx="31.9993" cy="45" r="1.66667"
                                        transform="rotate(180 31.9993 45)" fill="#13C296" />
                                    <circle cx="75.6654" cy="16" r="1.66667"
                                        transform="rotate(180 75.6654 16)" fill="#13C296" />
                                    <circle cx="31.9993" cy="16" r="1.66667"
                                        transform="rotate(180 31.9993 16)" fill="#13C296" />
                                    <circle cx="75.6654" cy="59" r="1.66667"
                                        transform="rotate(180 75.6654 59)" fill="#13C296" />
                                    <circle cx="31.9993" cy="59" r="1.66667"
                                        transform="rotate(180 31.9993 59)" fill="#13C296" />
                                    <circle cx="75.6654" cy="30.6666" r="1.66667"
                                        transform="rotate(180 75.6654 30.6666)" fill="#13C296" />
                                    <circle cx="31.9993" cy="30.6666" r="1.66667"
                                        transform="rotate(180 31.9993 30.6666)" fill="#13C296" />
                                    <circle cx="75.6654" cy="1.66665" r="1.66667"
                                        transform="rotate(180 75.6654 1.66665)" fill="#13C296" />
                                    <circle cx="31.9993" cy="1.66665" r="1.66667"
                                        transform="rotate(180 31.9993 1.66665)" fill="#13C296" />
                                    <circle cx="60.9993" cy="132" r="1.66667"
                                        transform="rotate(180 60.9993 132)" fill="#13C296" />
                                    <circle cx="17.3333" cy="132" r="1.66667"
                                        transform="rotate(180 17.3333 132)" fill="#13C296" />
                                    <circle cx="60.9993" cy="117.333" r="1.66667"
                                        transform="rotate(180 60.9993 117.333)" fill="#13C296" />
                                    <circle cx="17.3333" cy="117.333" r="1.66667"
                                        transform="rotate(180 17.3333 117.333)" fill="#13C296" />
                                    <circle cx="60.9993" cy="102.667" r="1.66667"
                                        transform="rotate(180 60.9993 102.667)" fill="#13C296" />
                                    <circle cx="17.3333" cy="102.667" r="1.66667"
                                        transform="rotate(180 17.3333 102.667)" fill="#13C296" />
                                    <circle cx="60.9993" cy="88" r="1.66667"
                                        transform="rotate(180 60.9993 88)" fill="#13C296" />
                                    <circle cx="17.3333" cy="88" r="1.66667"
                                        transform="rotate(180 17.3333 88)" fill="#13C296" />
                                    <circle cx="60.9993" cy="73.3333" r="1.66667"
                                        transform="rotate(180 60.9993 73.3333)" fill="#13C296" />
                                    <circle cx="17.3333" cy="73.3333" r="1.66667"
                                        transform="rotate(180 17.3333 73.3333)" fill="#13C296" />
                                    <circle cx="60.9993" cy="45" r="1.66667"
                                        transform="rotate(180 60.9993 45)" fill="#13C296" />
                                    <circle cx="17.3333" cy="45" r="1.66667"
                                        transform="rotate(180 17.3333 45)" fill="#13C296" />
                                    <circle cx="60.9993" cy="16" r="1.66667"
                                        transform="rotate(180 60.9993 16)" fill="#13C296" />
                                    <circle cx="17.3333" cy="16" r="1.66667"
                                        transform="rotate(180 17.3333 16)" fill="#13C296" />
                                    <circle cx="60.9993" cy="59" r="1.66667"
                                        transform="rotate(180 60.9993 59)" fill="#13C296" />
                                    <circle cx="17.3333" cy="59" r="1.66667"
                                        transform="rotate(180 17.3333 59)" fill="#13C296" />
                                    <circle cx="60.9993" cy="30.6666" r="1.66667"
                                        transform="rotate(180 60.9993 30.6666)" fill="#13C296" />
                                    <circle cx="17.3333" cy="30.6666" r="1.66667"
                                        transform="rotate(180 17.3333 30.6666)" fill="#13C296" />
                                    <circle cx="60.9993" cy="1.66665" r="1.66667"
                                        transform="rotate(180 60.9993 1.66665)" fill="#13C296" />
                                    <circle cx="17.3333" cy="1.66665" r="1.66667"
                                        transform="rotate(180 17.3333 1.66665)" fill="#13C296" />
                                    <circle cx="46.3333" cy="132" r="1.66667"
                                        transform="rotate(180 46.3333 132)" fill="#13C296" />
                                    <circle cx="2.66536" cy="132" r="1.66667"
                                        transform="rotate(180 2.66536 132)" fill="#13C296" />
                                    <circle cx="46.3333" cy="117.333" r="1.66667"
                                        transform="rotate(180 46.3333 117.333)" fill="#13C296" />
                                    <circle cx="2.66536" cy="117.333" r="1.66667"
                                        transform="rotate(180 2.66536 117.333)" fill="#13C296" />
                                    <circle cx="46.3333" cy="102.667" r="1.66667"
                                        transform="rotate(180 46.3333 102.667)" fill="#13C296" />
                                    <circle cx="2.66536" cy="102.667" r="1.66667"
                                        transform="rotate(180 2.66536 102.667)" fill="#13C296" />
                                    <circle cx="46.3333" cy="88" r="1.66667"
                                        transform="rotate(180 46.3333 88)" fill="#13C296" />
                                    <circle cx="2.66536" cy="88" r="1.66667"
                                        transform="rotate(180 2.66536 88)" fill="#13C296" />
                                    <circle cx="46.3333" cy="73.3333" r="1.66667"
                                        transform="rotate(180 46.3333 73.3333)" fill="#13C296" />
                                    <circle cx="2.66536" cy="73.3333" r="1.66667"
                                        transform="rotate(180 2.66536 73.3333)" fill="#13C296" />
                                    <circle cx="46.3333" cy="45" r="1.66667"
                                        transform="rotate(180 46.3333 45)" fill="#13C296" />
                                    <circle cx="2.66536" cy="45" r="1.66667"
                                        transform="rotate(180 2.66536 45)" fill="#13C296" />
                                    <circle cx="46.3333" cy="16" r="1.66667"
                                        transform="rotate(180 46.3333 16)" fill="#13C296" />
                                    <circle cx="2.66536" cy="16" r="1.66667"
                                        transform="rotate(180 2.66536 16)" fill="#13C296" />
                                    <circle cx="46.3333" cy="59" r="1.66667"
                                        transform="rotate(180 46.3333 59)" fill="#13C296" />
                                    <circle cx="2.66536" cy="59" r="1.66667"
                                        transform="rotate(180 2.66536 59)" fill="#13C296" />
                                    <circle cx="46.3333" cy="30.6666" r="1.66667"
                                        transform="rotate(180 46.3333 30.6666)" fill="#13C296" />
                                    <circle cx="2.66536" cy="30.6666" r="1.66667"
                                        transform="rotate(180 2.66536 30.6666)" fill="#13C296" />
                                    <circle cx="46.3333" cy="1.66665" r="1.66667"
                                        transform="rotate(180 46.3333 1.66665)" fill="#13C296" />
                                    <circle cx="2.66536" cy="1.66665" r="1.66667"
                                        transform="rotate(180 2.66536 1.66665)" fill="#13C296" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-default-layout>

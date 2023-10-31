<x-default-layout>
    <div style="background-color : #f4f4f0" class=" sm:mx-32 lg:mx-32 xl:mx-72 ">
        <div class="flex justify-between container mx-auto">
            <div class="w-full">
                <div class="mt-4 px-4">
                    <h1 class="text-3xl font-semibold py-7 px-5">addbyme</h1>
                    <h1 class="font-thinner flex text-4xl pt-10 px-5">Setup Your ABM Id
                    </h1>

                    <form class="mx-5 my-5">
                        <label class="relative block p-3 border-2 border-black rounded" htmlFor="name">
                            <span class="text-md font-semibold text-zinc-900" htmlFor="name">
                                Name
                            </span>
                            <input class="w-full bg-transparent p-0 text-sm  text-gray-500 focus:outline-none"
                                id="name" type="text" placeholder="Your name" />
                        </label>
                        <div class="mt-5">
                            <label class="input-field inline-flex items-baseline border-2 border-black rounded  p-4">
                                <span class="flex-none text-dusty-blue-darker select-none leading-none">addby.me/
                                </span>
                                <div class="flex-1 leading-none">
                                    <input id="handle" type="text"
                                        class="w-full pl-1 bg-transparent focus:outline-none" name="handle"
                                        placeholder="username" />
                                </div>
                            </label>
                        </div>

                        <div class="shrink-0 mt-5">
                            <img class="h-20 w-20 object-cover rounded-full" src="https://sahilnetic.xyz/sahilnetic.png"
                                alt="Current profile photo" />
                        </div>
                        <label class="block pt-2">
                            <span class="sr-only t-2">Choose profile photo</span>
                            <input type="file"
                                class="w-full text-sm text-slate-500
          file:mr-4 file:py-2 file:px-4
          file:rounded-full file:border-0
          file:text-sm file:font-semibold
          file:bg-pink-300 file:text-zinc-900
          hover:file:bg-rose-300
        " />
                        </label>



                        <label class="relative block p-3 border-2 mt-5 border-black rounded" htmlFor="name">
                            <span class="text-md font-semibold text-zinc-900" htmlFor="name">
                                Bio
                            </span>

                            <input
                                class="w-full   p-0 text-sm border-none bg-transparent text-gray-500 focus:outline-none"
                                id="name" type="text" placeholder="Write Your Bio" />
                        </label>


                        <label class="relative block p-3 border-2  mt-5 border-black rounded" htmlFor="name">
                            <span class="text-md font-semibold  text-zinc-900" htmlFor="name">
                                Upi Id
                            </span>

                            <input
                                class="w-full read-only:bg-zinc-800  p-0 text-sm bg-transparent text-gray-500 focus:outline-none"
                                id="name" type="text" placeholder="ie : lisa859sh@okaxis" />
                            <button class="font-medium bg-blue-500 px-2 text-white text-sm rounded-md">learn
                                more</button>
                        </label>

                        <label class="relative block p-3 border-2 mt-5 border-black rounded" htmlFor="name">
                            <span class="text-md font-semibold  text-zinc-900" htmlFor="name">
                                Paypal Me
                            </span>

                            <input
                                class="w-full read-only:bg-zinc-800  p-0 text-sm bg-transparent text-gray-500 focus:outline-none"
                                id="name" type="text" placeholder="ie : paypal.me/yubashika" />
                            <button class="font-medium bg-blue-500 px-2 text-white text-sm rounded-md">learn
                                more</button>
                        </label>

                        <h1 class="text-2xl font-semibold mt-5">Category :</h1>
                        <p class="text-black text-sm font-normal flex gap gap-2 pt-2">
                            <button
                                class="border-2 border-black rounded-md border-b-4 border-l-4 font-black px-2">Business</button>
                            <button
                                class="border-2 border-black rounded-md border-b-4 border-l-4 font-black px-2">Creative</button>
                            <button
                                class="border-2 border-black rounded-md border-b-4 border-l-4 font-black px-2">Education</button>
                        </p>

                        <p class="text-black text-sm font-normal flex gap gap-2 pt-2">
                            <button
                                class="border-2 border-black rounded-md border-b-4 border-l-4 font-black px-2">Tech</button>
                            <button
                                class="border-2 border-black rounded-md border-b-4 border-l-4 font-black px-2">Entertainment</button>
                            <button
                                class="border-2 border-black rounded-md border-b-4 border-l-4 font-black px-2">Other</button>
                        </p>

                        <Button
                            class="mt-5 border-2 px-5 py-2 rounded-lg border-black border-b-4 font-black translate-y-2 border-l-4">
                            Submit
                        </Button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    </div>
</x-default-layout>

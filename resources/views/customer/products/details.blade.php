<x-app-layout>
    <x-slot name="header"></x-slot>

    <div>
        <div class="bg-[#f5f5f5] w-full h-[150px] flex flex-col justify-center items-center relative z-10 overflow-hidden">
            <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] bottom-[-10%] left-[10%] z-0">
            <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] top-[-10%] right-[10%] z-0">
            <div class="flex flex-col gap-y-3 justify-center items-center">
                <div class="font-bold text-[28px]">Product Details</div>
                <div class="text-[#636363]">Home / Shop / Product Details</div>
            </div>
        </div>

        <div class="mt-16 ml-24 mr-24 flex  mb-16">
            <div class="left">
                <div class="big-img">
                    <img id="largeImage" src="{{asset ('storage/product_image.png')}}" alt="">
                </div>
                <div class="images">
                    <div class="small-img">
                        <img src="{{asset ('storage/product_image.png')}}" alt="" class="thumbnail">
                    </div>
                    <div class="small-img">
                        <img src="{{asset ('storage/product_image.png')}}" alt="" class="thumbnail">
                    </div>
                    <div class="small-img">
                        <img src="{{asset ('storage/product_image.png')}}" alt="" class="thumbnail ">
                    </div>
                    <div class="small-img">
                        <img src="{{asset ('storage/product_image.png')}}" alt="" class="thumbnail">
                    </div>
                </div>
            </div>


            <div class="w-[60%]">
                <p class="pt-7 text-[#a79f9f] text-[20px]">Coats</p>
                <p class="pt-2 pb-3 text-[25px]">Trendy Black Coat</p>

                <!-- RAting star -->
                <div class="flex items-center pb-3">
                    <svg class="w-8 h-8 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-8 h-8 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-8 h-8 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-8 h-8 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <svg class="w-8 h-8 text-yellow-300 me-1 aria-hidden=" true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <p class="pl-4 text-[18px]">4.95 / 5 (245 Reviews)</p>
                </div>

                <p class="pt-6 text-[30px]" id="cost_product">$75.00</p>
                <p class="pt-3 w-[80%]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto unde
                    dolorum possimus at? Maiores porro ipsa eligendi rem, ut, totam nemo non perferendis explicabo in
                    cupiditate, sint est soluta nobis.
                </p>


                <p class="mt-6 mb-2 text-[18px]">Color:</p>

                <div class="flex flex-wrap">
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <input type="radio" name="color" value="gray" class="hidden peer">
                        <span class="block w-8 h-8 bg-gray-500 rounded-full border-2 border-transparent peer-checked:border-gray-300 peer-checked:border-2 shadow hover:shadow-lg transition-shadow duration-300 transform peer-checked:scale-110"></span>

                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <input type="radio" name="color" value="white" class="hidden peer">
                        <span class="block w-8 h-8 bg-white rounded-full border-2 border-gray-300 peer-checked:border-black peer-checked:border-2 shadow hover:shadow-lg transition-shadow duration-300 transform peer-checked:scale-110"></span>

                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <input type="radio" name="color" value="black" class="hidden peer">
                        <span class="block w-8 h-8 bg-black rounded-full border-2 border-transparent peer-checked:border-gray-500 shadow hover:shadow-lg transition-shadow duration-300 transform peer-checked:scale-110"></span>

                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <input type="radio" name="color" value="beige" class="hidden peer">
                        <span class="block w-8 h-8 bg-yellow-100 rounded-full border-2 border-transparent peer-checked:border-yellow-600 peer-checked:border-2 shadow hover:shadow-lg transition-shadow duration-300 transform peer-checked:scale-110"></span>

                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <input type="radio" name="color" value="brown" class="hidden peer">
                        <span class="block w-8 h-8 bg-[brown] rounded-full border-2 border-transparent peer-checked:border-amber-500 peer-checked:border-2 shadow hover:shadow-lg transition-shadow duration-300 transform peer-checked:scale-110"></span>
                    </label>
                </div>



                <p class="mt-6 mb-2 text-[18px]">Size:</p>
                <ul class="w-[70%] grid  gap-2 grid-cols-6 mb-5">
                    <li>
                        <input type="radio" id="Size_S" name="Size" value="" class="hidden peer" required />
                        <label for="Size_S" class="inline-flex justify-center items-center  w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:text-white    peer-checked:bg-black peer-hover:text-white peer-hover:bg-black ">
                            <div class="flex justify-center items-center">
                                <span class="text-lg font-semibold">S</span>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="Size_M" name="Size" value="hosting-big" class="hidden peer">
                        <label for="Size_M" class="inline-flex justify-center items-center  w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:text-white    peer-checked:bg-black peer-hover:text-white peer-hover:bg-black ">
                            <div class="block">
                                <span class=" text-lg font-semibold">M</span>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="Size_L" name="Size" value="hosting-big" class="hidden peer">
                        <label for="Size_L" class="inline-flex justify-center items-center w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:text-white    peer-checked:bg-black peer-hover:text-white peer-hover:bg-black ">
                            <div class="block">
                                <span class="text-lg font-semibold">L</span>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="Size_XL" name="Size" value="hosting-big" class="hidden peer">
                        <label for="Size_XL" class="inline-flex justify-center items-center w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:text-white    peer-checked:bg-black peer-hover:text-white peer-hover:bg-black ">
                            <div class="block">
                                <span class=" text-lg font-semibold">XL</span>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="Size_XXL" name="Size" value="hosting-big" class="hidden peer">
                        <label for="Size_XXL" class="inline-flex justify-center items-center w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:text-white    peer-checked:bg-black peer-hover:text-white peer-hover:bg-black ">
                            <div class="block">
                                <span class=" text-lg font-semibold">XXL</span>
                            </div>

                        </label>
                    </li>

                </ul>



                <div class="flex w-full mt-14 items-center">

                    <div class="relative flex items-center max-w-[8rem] mr-6">
                        <button onclick="" type="button" id="decrement-button" class=" hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                            <svg class="w-4 h-4 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                            </svg>
                        </button>
                        <input type="text" id="quantity-input" class="border-x-0 border-gray-300 h-11 text-center text-lg block w-full py-2.5 " value="1" required disabled />
                        <button type="button" id="increment-button" class="hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                            <svg class="w-4 h-4 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                        </button>
                    </div>

                    <button type="button" class="w-1/5 mr-6 text-black bg-white h-14 text-[17px] rounded-md hover:bg-black hover:text-white border-black border-2 ">Add
                        to cart</button>

                    <form class="w-1/5 mr-6 " action="{{url('/checkout/confirmation')}}">
                        <div class="flex justify-center">
                            <button type="submit" class="w-full text-black bg-white h-14 text-[17px] rounded-md hover:bg-black hover:text-white border-black border-2">Buy
                                Now</button>
                        </div>
                    </form>



                </div>

            </div>
        </div>

        <div class="flex flex-col gap-y-5 items-center px-60">
            <div class="font-bold text-2xl">Description</div>
            <ul class="flex flex-col gap-y-4">
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero voluptas perspiciatis est hic
                    maxime, labore mollitia atque eligendi, obcaecati cum porro distinctio quam iste non, accusantium
                    sint! Officiis, harum repellendus?</li>
                <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum doloremque adipisci molestiae
                    inventore eligendi ex nisi ea modi laboriosam veniam quia rem, ullam quasi minus voluptatem. Dolor
                    necessitatibus quis unde!</li>
                <ul class="flex flex-col gap-y-3">
                    <li class="flex gap-x-4">
                        <svg width="29" height="24" viewBox="0 0 29 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="17" cy="12" r="12" fill="#0A0A0A" />
                            <circle cx="10" cy="12" r="8.75" fill="#D9D9D9" stroke="white" stroke-width="2.5" />
                        </svg>
                        <div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed, accusantium.</div>
                    </li>
                    <li class="flex gap-x-4">
                        <svg width="29" height="24" viewBox="0 0 29 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="17" cy="12" r="12" fill="#0A0A0A" />
                            <circle cx="10" cy="12" r="8.75" fill="#D9D9D9" stroke="white" stroke-width="2.5" />
                        </svg>

                        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, tempora.</div>
                    </li>
                </ul>
            </ul>
        </div>




    </div>
</x-app-layout>
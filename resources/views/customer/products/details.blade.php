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

        <div class="pt-16 pl-24 pr-24 flex gap-x-10 mb-16">
            <div class="w-1/2 min-w-[300px] flex flex-wrap justify-center">
                <img src="{{asset ('storage/product_image.png')}}" alt="" class="w-full max-w-[440px] object-cover object-center mb-2">
                <div class="flex justify-center w-fit">
                    <img src="{{asset ('storage/product_image.png')}}" alt="" class="w-1/5 object-cover ">
                    <img src="{{asset ('storage/product_image.png')}}" alt="" class="w-1/5 object-cover">
                    <img src="{{asset ('storage/product_image.png')}}" alt="" class="w-1/5 object-cover">
                    <img src="{{asset ('storage/product_image.png')}}" alt="" class="w-1/5 object-cover">
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
                <p class="pt-3 w-[80%]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto unde dolorum possimus at? Maiores porro ipsa eligendi rem, ut, totam nemo non perferendis explicabo in cupiditate, sint est soluta nobis.
                </p>


                <p class="mt-6 mb-2 text-[18px]">Size:</p>
                <ul class="w-[70%] grid  gap-2 grid-cols-6 mb-5">
                    <li>
                        <input type="radio" id="Size_S" name="Size" value="" class="hidden peer" required />
                        <label for="Size_S" class="inline-flex justify-center items-center  w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-black    peer-checked:text-black hover:text-gray-600 hover ">
                            <div class="flex justify-center items-center">
                                <span class="text-lg font-semibold">S</span>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="Size_M" name="Size" value="hosting-big" class="hidden peer">
                        <label for="Size_M" class="inline-flex justify-center items-center  w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-black peer-checked:text-black hover:text-gray-600 hover ">
                            <div class="block">
                                <span class=" text-lg font-semibold">M</span>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="Size_L" name="Size" value="hosting-big" class="hidden peer">
                        <label for="Size_L" class="inline-flex justify-center items-center w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-black peer-checked:text-black hover:text-gray-600 hover ">
                            <div class="block">
                                <span class="text-lg font-semibold">L</span>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="Size_XL" name="Size" value="hosting-big" class="hidden peer">
                        <label for="Size_XL" class="inline-flex justify-center items-center w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-black peer-checked:text-black hover:text-gray-600 hover ">
                            <div class="block">
                                <span class=" text-lg font-semibold">XL</span>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="Size_XXL" name="Size" value="hosting-big" class="hidden peer">
                        <label for="Size_XXL" class="inline-flex justify-center items-center w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-black peer-checked:text-black hover:text-gray-600 hover ">
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
                            <svg class="w-4 h-4 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                        </button>
                    </div>

                    <button type="button" class="w-1/4 mr-6 text-white bg-black h-14 text-[17px] rounded-md hover:bg-gray-300 hover:text-black">Add to cart</button>

                    <form class="w-1/4 mr-6 " action="{{url('/checkout/confirmation')}}">
                        <div class="flex justify-center">
                            <button type="submit" class="w-full text-white bg-black h-14 text-[17px] rounded-md hover:bg-gray-300 hover:text-black">Buy Now</button>
                        </div>
                    </form>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 cursor-pointer" id="favorite">
                        <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                    </svg>

                </div>

            </div>
        </div>

        <div class="flex flex-col gap-y-5 items-center px-24">
            <div class="font-bold text-2xl">Description</div>
            <ul class="flex flex-col gap-y-4">
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero voluptas perspiciatis est hic maxime, labore mollitia atque eligendi, obcaecati cum porro distinctio quam iste non, accusantium sint! Officiis, harum repellendus?</li>
                <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum doloremque adipisci molestiae inventore eligendi ex nisi ea modi laboriosam veniam quia rem, ullam quasi minus voluptatem. Dolor necessitatibus quis unde!</li>
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
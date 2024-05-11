<x-app-layout>
    <x-slot name="header"></x-slot>

   
        <div class="bg-[#f5f5f5] w-full h-[150px] flex flex-col justify-center items-center relative z-10 overflow-hidden completed">
                <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] bottom-[-10%] left-[10%] z-0">
                <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] top-[-10%] right-[10%] z-0">
                <div class="flex flex-col gap-y-3 justify-center items-center">
                    <div class="font-bold text-[28px]">About us </div>
                    <div class="text-[#636363]">Home / About us</div>
                </div>
        </div>
        <div class="ourstory flex justify-center items-center m-10">
            <p class="text-[25px]">Our story</p>
        </div>

        <div class="crafted_with_care flex justify-center items-center ">
            <p class="font-bold text-[35px]">Crafted with care : Fine </p>
        </div>

        <div class="material flex justify-center items-center mb-10"> <p class="font-bold text-[35px]">Materials, Thoughtful Design</p></div>

        <div class="content0 w-4/5 mx-auto flex justify-center mb-10 ">
            <div class="content "><p class = "text-[20px]">Your style starts here. Discover our wide selection of trendy and affordable fashion.Experience the perfect shopping experience with our high-quality clothing and exceptional customer service.</p></div>
        </div>

        <div class="img flex justify-centert w-4/5 mx-auto mb-10">
            <div class="img1 mr-12"></div>
            <div class="img23">
               <div class="img2 mb-8"></div>
               <div class="img3"></div>
            </div>
        </div>

        <div class="bang bg-black flex w-4/5 pl-20 py-10 mx-auto mb-32 ">
            
            <div class="achieve  text-white text-center  border-r border-gray-700 border-solid pr-28">
                <p class="text-4xl">10+</p>
                <p class=" text-gray-400">Years</p>
            </div>
            <div class="achieve text-white text-center  border-r border-gray-700 border-solid px-20">
                <p class="text-4xl">30+</p>
                <p class=" text-gray-400">Stores</p>
            </div>
            <div class="achieve text-white text-center border-r
             border-gray-700 border-solid px-20">
                <p class="text-4xl">10000+</p>
                <p class=" text-gray-400">Customers</p>
            </div>
            <div class="achieve text-white text-center  border-r border-gray-700 border-solid px-20">
                <p class="text-4xl">10+</p>
                <p class=" text-gray-400">Awards</p>
            </div>
            <div class="achieve text-white text-center pl-20 ">
                <p class="text-4xl">98+</p>
                <p class=" text-gray-400">Satisfied</p>
            </div>
            
            
        </div>

        <div class="quality flex  bg-gray-100 mx-5 mb-32">
            <div class="anh w-700px "></div>
            <div class="detail pt-10 w-1/2">
                <p class=" text-[30px]">Our Product Quality</p>

                <div class="my-3"><h2 class=" text-[50px] font-bold">We Make Thing Comfy, Pretty, and Fancy</h2></div>

                <p>Discover fashion perfection at Fusion. Trendsetting designs, timeless elegance. Elevate your wardrobe with us</p>

                <div class="icon flex ">
                    <div class="icon1 mt-10 w-2/4 pr-5">
                        <img src="{{asset ('storage/icon.png')}}" alt="#" 
                        class = "w-28 h-28 ">
                        <p class="text-[25px] font-medium">100% cotton</p>
                        <p>The function of cotton is primarily as a textile material used in the production of clothing, household items, and various industrial applications.</p>
                    </div>

                    <div class="icon2  mt-10 w-2/4 pr-5">
                        <img src="{{asset ('storage/icon2.png')}}" alt="#"
                        class = "w-28 h-28 ">
                        <p class="text-[25px]">Breathable Fabric</p>
                        <p>The function of breathable fabric is to allow air and moisture to pass through, promoting comfort and preventing overheating.</p>
                    </div>

                </div>
            </div>
        </div>


        <div class="team">
            <div class="ourteam text-center mb-10">
                <p class="text-[25px]">Our team</p>
                <p class="text-[40px] font-bold">Meet our team</p>
            </div>
            <div class="member flex justify-center">
                
                <div class="co-founder1 mr-5"></div>
                    <div><img src="{{asset ('storage/member_img2.jpg')}}" alt=""
                    class ="w-96 h-96 object-cover"></div>
                   <!-- <p>Trần Giáp Minh</p>
                   <p>Co-Founders</p> 
                     -->
                <div class="founder mr-5">
                     <img src="{{asset ('storage/member_img.jpg')}}" alt=""
                    class ="w-96 h-96 object-cover">
                </div>
                   
                <div class="co-founder2 "> <img src="{{asset ('storage/member_img3.jpg')}}" alt=""
                    class ="w-96 h-96 object-cover"></div>
                   
            </div>
        </div>
 

</x-app-layout>

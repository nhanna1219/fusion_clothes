<x-app-layout>
    <x-slot name="header"></x-slot>
    <div>
        <div class="bg-[#f5f5f5] w-full h-[150px] flex flex-col justify-center items-center relative z-10 overflow-hidden completed">
            <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] bottom-[-10%] left-[10%] z-0">
            <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] top-[-10%] right-[10%] z-0">
            <div class="flex flex-col gap-y-3 justify-center items-center">
                <div class="font-bold text-[28px]">Order Completed</div>
                <div class="text-[#636363]">Home / Order</div>
            </div>
        </div>
        <div class="tick">
        <img src="{{asset ('storage/checkmark-circle-outline.svg')}}" alt="" class="icons">
        <p class =" sentence1">Your order is completed!</p>
        <p class =" sentence2">Thanks you. Your order has been received</p>
        </div>
        <div class="in4order rounded">
            <div class=" items">
                <p>Order ID</p>
                <p>#GM123456</p>
            </div>
            <div class="items">
                <p>Payment method</p>
                <p>Paypal</p>
            </div>
            <div class="items">
                <p>Transaction ID</p>
                <p>NJJBJHBU1312</p>
            </div>
            <div class="items">
                <p>Estimated Delivery Date</p>
                <p>12/04/2024</p>
            </div>
            <div class="download rounded"> <Button>Download Invoice</Button></div>


        </div>


        <!-- Table product -->
        <div class="tableproduct">
            <div class="detail"> Order details</div>
            <div class="producttitle">
                <p>Products</p>
                <p>Sub total</p>
            </div>
            <div class="product">
                <div class="inforproduct">
                    <img src="{{asset ('storage/product_image.png')}}" alt="" class="icons">
                    <div class="contentpro">
                        <p>Trendy Brown Coat</p>
                        <div class="colorsize">
                            <p>Color : Brown</p>
                            <p>Size : XXL</p>
                        </div>
                    </div>

                </div>
                <p>300.00$</p>
            </div>
            <div class="product">
                <div class="inforproduct">
                    <img src="{{asset ('storage/product_image.png')}}" alt="" class="icons">
                    <div class="contentpro">
                        <p>Trendy Brown Coat</p>
                        <div class="colorsize">
                            <p>Color : Brown</p>
                            <p>Size : XXL</p>
                        </div>
                    </div>

                </div>
                <p>300.00$</p>
            </div> 
            <div class="product">
                <div class="inforproduct">
                    <img src="{{asset ('storage/product_image.png')}}" alt="" class="icons">
                    <div class="contentpro">
                        <p>Trendy Brown Coat</p>
                        <div class="colorsize">
                            <p>Color : Brown</p>
                            <p>Size : XXL</p>
                        </div>
                    </div>

                </div>
                <p>300.00$</p>
            </div>
            <div class="product">
                <div class="inforproduct">
                    <img src="{{asset ('storage/product_image.png')}}" alt="" class="icons">
                    <div class="contentpro">
                        <p>Trendy Brown Coat</p>
                        <div class="colorsize">
                            <p>Color : Brown</p>
                            <p>Size : XXL</p>
                        </div>
                    </div>

                </div>
                <p>300.00$</p>
            </div>
            <div class="product">
                <div class="inforproduct">
                    <img src="{{asset ('storage/product_image.png')}}" alt="" class="icons">
                    <div class="contentpro">
                        <p>Trendy Brown Coat</p>
                        <div class="colorsize">
                            <p>Color : Brown</p>
                            <p>Size : XXL</p>
                        </div>
                    </div>

                </div>
                <p>300.00$</p>
            </div>

        </div>


      <div class="fee">
        <div class="shipping">
            <p>Shipping</p>
            <p>00.00$</p>
        </div>
        <div class="taxes">
            <p>Taxes</p>
            <p>00.00$</p>
        </div>
        <div class="coupon">
            <p>Coupon Discount</p>
            <p>00.00$</p>
        </div>
        <div class="total">
            <p>Total</p>
            <p>00.00$</p>
        </div>
      </div>
    </div> 
    

</x-app-layout>

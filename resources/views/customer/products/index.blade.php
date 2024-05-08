<x-app-layout>
    <x-slot name="header"></x-slot>

    <div>
        <div class="bg-[#f5f5f5] w-full h-[150px] flex flex-col justify-center items-center relative z-10 overflow-hidden">
            <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] bottom-[-10%] left-[10%] z-0">
            <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] top-[-10%] right-[10%] z-0">
            <div class="flex flex-col gap-y-3 justify-center items-center">
                <div class="font-bold text-[28px]">Shop</div>
                <div class="text-[#636363]">Home / Shop</div>
            </div>
        </div>
        <div class="flex gap-x-10 py-10 px-28">
            <div class="flex flex-col gap-y-4 text-[20px] font-bold">
                <div class="">Filter Options</div>
                <div class="h-[1.5px] bg-[#C9C9C9] opacity-60"></div>
                <div class="flex flex-col gap-y-3">
                    <div>Category</div>
                    <div class="flex flex-col gap-y-2 font-normal text-[16px]">
                        @foreach ($parentCategories as $parentCategory)
                            <div class="flex gap-x-4 items-center caret-transparent">
                                <input type="checkbox" 
                                    id="{{$parentCategory->name}}-filtered" 
                                    name="categories" 
                                    value="{{$parentCategory->name}}" 
                                    onchange="filterProductsByCategory(this)" 
                                    class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black"
                                    @if (in_array($parentCategory->name, explode(',', $q_categories))) 
                                        checked="checked"
                                    @endif>
                                <label for="{{$parentCategory->name}}-filtered" class="select-none">{{$parentCategory->name}}</label>
                            </div>
                        @endforeach
                        @foreach ($childCategories as $childCategory)
                            <div class="flex gap-x-4 items-center caret-transparent">
                                <input type="checkbox" 
                                    id="{{$childCategory->name}}-filtered" 
                                    name="filters" 
                                    value="{{$childCategory->name}}" 
                                    onchange="filterProductsByCategory(this)" 
                                    class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black"
                                    @if (in_array($childCategory->name, explode(',', $q_filters))) 
                                        checked="checked"
                                    @endif>
                                <label for="{{$childCategory->name}}-filtered" class="select-none">{{$childCategory->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="h-[1.5px] bg-[#C9C9C9] opacity-60"></div>
                <div>
                    <div class="flex flex-col gap-y-3 mb-3">
                        <div>Price</div>
                        <div id="price" class="flex font-normal text-[#4A4A4A] text-base">
                            <span id="min-value">${{ explode(',', $range)[0]}}</span>
                            <div class="ml-1 mr-1">-</div>
                            <span id="max-value">${{ explode(',', $range)[1]}}</span>
                        </div>
                    </div>
                    <div id="slider" class="relative h-[5px] bg-[#C9C9C9]">
                        <div id="progress" class="h-full left-0 right-0 absolute bg-[#0A0A0A]"></div>
                    </div>
                    <div id="range-input" class="relative">
                        <input type="range" id="range-min" min="0" max="1000" value="{{ explode(',', $range)[0] }}" step="10">
                        <input type="range" id="range-max" min="0" max="1000" value="{{ explode(',', $range)[1] }}" step="10">
                    </div>
                </div>
            </div>
            <div class="flex flex-col ml-20 gap-y-10 w-full">
                <div class="flex flex-col gap-y-5">
                    <div class="flex justify-between items-center">
                    <div>Showing <span id="start-result">{{ $products->firstItem() }}</span>-<span id="end-result">{{ $products->lastItem() }}</span> of <span id="total-results">{{ $products->total() }}</span> results</div>
                        <div>
                            Sort by: 
                            <select name="" id="sorting">
                                <option value="price" {{ $sort == 'price' ? 'selected' : '' }}>Price</option>
                                <option value="name" {{ $sort == 'name' ? 'selected' : '' }}>Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-5 items-center flex-wrap min-h-10" id="filter-container">
                        <div>Active Filter</div>
                        @if (!empty($q_categories))
                            @foreach (explode(',', $q_categories) as $category)
                                <x-filter-item name="{{ $category }}"/>
                            @endforeach
                        @endif
                        @if (!empty($q_filters))
                            @foreach (explode(',', $q_filters) as $filter)
                                <x-filter-item name="{{ $filter }}"/>
                            @endforeach
                        @endif
                        <div class="underline cursor-pointer" id="clear-filter" onclick="clearAllFilters()">Clear All</div>
                    </div>
                </div>
                <div class="flex gap-x-7 gap-y-8 flex-wrap min-h-60" id="product-container">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <x-product-item 
                                usage="product" id="product-item product-item-{{ $product->id }}" 
                                image="{{ $product->images->first()->image_path }}"
                                type="{{ $product->category->name }}"
                                rating="4"
                                price="{{ $product->price }}"
                                name="{{ $product->name }}"/>
                        @endforeach
                    @else
                        <div class="text-4xl text-center">No products found!</div>
                    @endif
                </div>
                {{ $products->appends(['filters' => $q_filters, 'categories' => $q_categories, 'range' => $range])->links("layouts.pagination")}}
            </div>
        </div>
    </div>
    <form id="form-filter" method="get">
        <input type="hidden" name="filters" id="filters" value="{{$q_filters}}">
        <input type="hidden" name="categories" id="categories" value="{{ $q_categories}}">
        <input type="hidden" name="range" id="range" value="" />
        <input type="hidden" name="sort" id="sort" value="{{ $sort }}" />
    </form>
    <script>
        const rangeInput = document.querySelectorAll("#range-input input");
        const priceInput = document.querySelectorAll("#price span");
        const range = document.querySelector("#slider #progress");
        let priceGap = 50;

        let sliderTimeout;

        updateSliderPrice();

        rangeInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                updateSliderPrice(e);
            });
        });

        rangeInput.forEach((input) => {
            input.addEventListener("mouseup", (e) => {
                clearTimeout(sliderTimeout);
                updateSliderPrice(e);
                sliderTimeout = setTimeout(() => {
                    document.getElementById("range").value = rangeInput[0].value + "," + rangeInput[1].value;
                    document.getElementById("form-filter").submit();
                }, 500);
            });
        });

        function updateSliderPrice(slider) {
            let minVal = parseInt(rangeInput[0].value),
                maxVal = parseInt(rangeInput[1].value);

            if (maxVal - minVal < priceGap) {
                if (slider && slider.target.id === "range-min") {
                    rangeInput[0].value = maxVal - priceGap;
                } else if (slider && slider.target.id === "range-max") {
                    rangeInput[1].value = minVal + priceGap;
                }
            } else {
                priceInput[0].textContent = "$" + minVal;
                priceInput[1].textContent = "$" + maxVal;

                range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
        }

        document.getElementById('sorting').addEventListener('change', function() {
            document.getElementById("sort").value = this.value;
            document.getElementById("form-filter").submit();
        })

        function filterProductsByCategory(category) {
            let filters = "";
            let categories = "";

            const filterCheckboxes = document.querySelectorAll("input[name='filters']:checked");
            filterCheckboxes.forEach(function(checkbox, index) {
                if (index === 0) {
                    filters += checkbox.value;
                } else {
                    filters += "," + checkbox.value;
                }
            });

            const categoryCheckboxes = document.querySelectorAll("input[name='categories']:checked");
            categoryCheckboxes.forEach(function(checkbox, index) {
                if (index === 0) {
                    categories += checkbox.value;
                } else {
                    categories += "," + checkbox.value;
                }
            });

            document.getElementById("filters").value = filters;
            document.getElementById("categories").value = categories;

            document.getElementById("form-filter").submit();
        }

        function clearAllFilters() {
            let categoryCheckboxes = document.querySelectorAll("input[name='categories']");
            let filterCheckboxes = document.querySelectorAll("input[name='filters']");
            
            categoryCheckboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });

            filterCheckboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });

            document.getElementById("categories").value = "";
            document.getElementById("filters").value = "";

            document.getElementById("form-filter").submit();
        }


        function removeFilter(name) {
            let filterItems = document.querySelectorAll('.filter-item');
            filterItems.forEach(function(item) {
                if (item.querySelector('div:first-child').textContent.trim() === name) {
                    item.remove();
                }
            });

            let checkboxes = document.querySelectorAll('input[name="categories"], input[name="filters"]');
            checkboxes.forEach(function(checkbox) {
                if (checkbox.value === name) {
                    checkbox.checked = false;
                }
            });

            let qCategoriesInput = document.getElementById('categories');
            let qFiltersInput = document.getElementById('filters');
            let qCategoriesArray = qCategoriesInput.value.split(',');
            let qFiltersArray = qFiltersInput.value.split(',');

            qCategoriesArray = qCategoriesArray.filter(function(item) {
                return item !== name;
            });

            qFiltersArray = qFiltersArray.filter(function(item) {
                return item !== name;
            });

            qCategoriesInput.value = qCategoriesArray.join(',');
            qFiltersInput.value = qFiltersArray.join(',');

            document.getElementById('form-filter').submit();
        }
    </script>
</x-app-layout>

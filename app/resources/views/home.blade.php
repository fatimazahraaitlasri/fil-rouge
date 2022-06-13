@component('components.layout')
    @component('components.navigation')
    @endcomponent
    @styles('home')
    @styles('card')


    <section class="home">
        <form class="form-row bg-white w-4/12 p-4 flex flex-col gap-3 mx-4">
            <div>
                <h2 class="text-3xl font-semibold w-4/5">
                    Discover new amazing places around you
                </h2>
                <p class="w-3/4  font-normal my-2 leading-relaxed">
                    Donec vitae dignissim magna, viverra semper justo. Cras blandit enim blandit porta elementum.
                </p>
            </div>
            <div class="flex flex-col gap-4 container">
                <div class="flex items-center  bg-transparent ">
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="text" class=" border-b-2 border-gray-200  p-1" placeholder="City">
                </div>

                <div class="flex gap-5 flex-wrap ">
                    <div class="flex items-center bg-transparent">
                        {{-- <i class="fas fa-calendar-alt"></i> --}}
                        <input type="date" class="border-b-2 border-gray-200 p-1 " placeholder="">
                    </div>
                    <div class="flex items-center bg-transparent">
                        {{-- <i class="fas fa-calendar-alt"></i> --}}
                        <input type="date" class="border-b-2 border-gray-200 p-1" placeholder="">
                    </div>
                </div>

            </div>

            <div class=" bg-rose-700 mt-3 w-auto flex text-white items-center justify-center p-2 rounded-lg gap-1">
                <i class="fas fa-search"></i>
                <button type="submit" class=" text-white"></button>
            </div>
        </form>
    </section>

@endcomponent

@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">

    <!-- trigger -->
    <div @click="show = ! show">
        {{$trigger}}
    </div >
    

    <!-- links -->
    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 max-h-32 overflow-auto" style="display:none">
        {{$slot}}
    </div>

</div>
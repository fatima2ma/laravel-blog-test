<div x-data='{show:false}' @click.away='show = false' class="relative">
    <!-- Trigger -->
    <div @click="show = ! show">
        {{ $trigger }}
    </div>
    <!-- links -->
    <div x-show='show' class="absolute py-2 bg-gray-100 rounded-xl w-full z-50 mt-1 overflow-auto max-h-52" style="display:none">
        {{ $slot }}
    </div>                     
</div>
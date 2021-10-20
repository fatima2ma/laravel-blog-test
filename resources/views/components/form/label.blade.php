@props(['name'])
<label for="{{$name}}" class="block mb-2 uppercase text-xs font-bold text-gray-700">
    {{ucwords($name)}}
</label>
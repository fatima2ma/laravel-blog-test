@auth
    <x-pannel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments" class="">
            @csrf 
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
                <h2 class="mx-4">Want To Participate?</h2>
            </header>
            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Quick, thing of something to say"></textarea>
                @error('body')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <x-button-submit>Post</x-button-submit>
        </form>
    </x-pannel>
@else
    <p>
        <a href="\register" class="text-gray-500 hover:text-gray-800 underline">Register</a>
         or 
        <a href="\login" class="text-gray-500 hover:text-gray-800 underline">Log in</a>
         to leave a comment.
    </p> 
@endauth
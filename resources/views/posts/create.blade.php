<x-layout>
    <section class="px-6 py-8 max-w-lg mx-auto">
        <h1 class="font-bold text-lg mb-4">Publish New Post</h1>
        <x-pannel class="">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                <x-form.input name='title'/>
                <x-form.input name="slug"/>
                <x-form.input name="excerpt"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.textarea name="body"/>
                
                <x-form.field>
                    <x-form.label name="category"/>
                    <select name="category" id="category">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                </x-form.field>
                <x-button-submit>Publish</x-button-submit>
            </form>
        </x-pannel>
    </section>
</x-layout>
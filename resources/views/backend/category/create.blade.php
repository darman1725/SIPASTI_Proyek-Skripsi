<x-app-layout>
    <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
        @csrf
        <x-card.index>
            <x-slot name="header">
                <x-card.title :icon="'menu-button-fill'" :title="'Create Categories'"></x-card.title>
                <div>
                    <x-button.back :href="route('category.index')"></x-button.back>
                </div>
            </x-slot>
            <x-input.1 :label="'Name'" :name="'name'" :type="'text'" :value="old('name')"></x-input.1>
            <x-input.textarea-full :label="'Description'" :name="'description'" :type="'text'" :value="old('description')">
            </x-input.textarea-full>
            <x-slot name="footer">
                <x-button.save></x-button.save>
                <div>
                    <x-button.back :href="route('category.index')"></x-button.back>
                </div>
            </x-slot>
        </x-card.index>
    </form>
</x-app-layout>

@props(['lists' => [], 'placeholder' => 'placeholder', 'model' => 'query'])
@php $lists = json_decode($lists); @endphp
<input type="text" id="search" wire:model="{{ $model }}" list="search-results" placeholder="{{ $placeholder }}" autocomplete="off">
<datalist id="search-results">
    @foreach($lists as $item)
        <option value="{{ $item->name }}"> 
    @endforeach
</datalist>
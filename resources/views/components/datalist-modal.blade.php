@props(['label' => 'addAriaLabel', 'key' => 'key', 'type' => 'type', 'placeholder' => 'placeholder', 'id' => 'modal_id', 
        'title' => 'modal-title', 'lists' => []])
@php $lists = json_decode($lists); @endphp
<div wire:ignore.self class="modal fade" {{ $attributes->merge(['id' => $id, 'arialLabelledBy' => $label]) }} tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">             
                <h5 class="modal-title" {{ $attributes->merge([ 'id' => $label]) }}> {{ $title }}</h5>         
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                    <span aria-hidden="true">×</span>             
                </button>           
            </div>
            <div class="modal-body">
                <div class="row">
                    <input class="col-md-10 mx-2" type="text" id="datalist_search" wire:model="query" wire:change="setUpdated()" list="search-results" placeholder="{{ $placeholder }}" autocomplete="off">
                    <datalist id="search-results">
                        @foreach($lists as $item)
                            <option value="{{ $item->$key }}"> 
                        @endforeach
                    </datalist>
                </div>
            </div>  
            <div class="modal-footer bg-whitesmoke">           
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store('{{ $key }}')" class="btn btn-primary close-modal">Submit</button>
            </div>   
        </div>
    </div>
</div>
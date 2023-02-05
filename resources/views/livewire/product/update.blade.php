<div wire:ignore.self>
    <form>
        <div class="form-divider">
            Product Information
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="name">Name</label>
                <input id="first_name" type="text" class="form-control" name="name" autofocus wire:model="name">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label>Category</label>
                <select wire:model="category" class="form-control selectric">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                    @if($category == $selected_category)
                    <option selected value="{{ $category }}">{{ ucfirst($category) }}</option>
                    @else
                    <option value="{{ $category }}">{{ ucfirst($category) }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label>Industry</label>
                <select wire:model="industry" class="form-control selectric">
                    <option value="">Select an industry</option>
                    @foreach($industries as $industry)
                    @if($industry == $selected_industry)
                    <option selected value="{{ $industry }}">{{ ucfirst($industry) }}</option>
                    @else
                    <option value="{{ $industry }}">{{ ucfirst($industry) }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="brand_owner">Brand Owner</label>
                <select wire:model="brand_owner" class="form-control selectric">
                    <option value="">Select a Brand Owner</option>
                    @foreach($brand_owners as $brand_owner)
                    @if($brand_owner == $selected_brand_owner)
                    <option selected value="{{ $brand_owner }}">{{ ucfirst($brand_owner) }}</option>
                    @else
                    <option value="{{ $brand_owner }}">{{ ucfirst($brand_owner) }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <button type="button" wire:click.prevent="save()" class="btn btn-primary btn-lg btn-block">
                Update
            </button>
        </div>
    </form>
</div>
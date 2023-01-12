
<div wire:ignore.self class="modal fade" id="modal-add-brand-owner-part" tabindex="-1" role="dialog" aria-labelledby="addBrandOwnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">             
                <h5 class="modal-title" id="addBrandOwnerModalLabel">Add Brand Owner</h5>         
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">               
                    <span aria-hidden="true">×</span>             
                </button>           
            </div>
            <div class="modal-body">           
                <form class="">

                    <div class="form-group">
                        <label>User Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="User Name" name="user_name" wire:model="user_name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Company Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Company Name" wire:model="name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Email" name="email" wire:model="email">
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-mobile"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Mobile phone" name="phone" wire:model="phone">
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name="password" wire:model="password">
                            @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </form>
            </div>  
            <div class="modal-footer bg-whitesmoke">           
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Submit</button>
            </div>   
        </div>
    </div>
</div>
<x-app-layout>

    <x-slot name="header">
        <div class="section-header">
            <h1>Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="#">Brand Owner</a></div>
            </div>
        </div>
    </x-slot>


    <x-slot name="card_header">
            <div class="card-header-form">
                @livewire('brand-owner.create')     
            </div>
    </x-slot>
        <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>
                <tr>
                <th class="text-center">
                    #
                </th>
                <th>Product Name</th>
                <th>Brand Owner</th>
                <th>Category</th>
                <th>SKU</th>
                <th>Status</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    1
                </td>
                <td>Covid Test Kit</td>
                <td class="align-middle">
                    <span>MedCure</span>
                </td>
                <td class="align-middle">
                    <span>7676-5731</span>
                </td>
                <td class="align-middle">
                    <span>Test Kit</span>
                </td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Edit</a></td>
                </tr>
                <tr>
                <td>
                    2
                </td>
                <td>EasyPen</td>
                <td class="align-middle">
                    <span>PencilPro</span>
                </td>
                <td class="align-middle">
                    <span>8956-4019</span>
                </td>
                <td>Stationary</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Edit</a></td>
                </tr>
                <tr>
                <td>
                    3
                </td>
                <td>K-Snacks</td>
                <td class="align-middle">
                    <span>FoodExpert</span>
                </td>
                <td class="align-middle">
                    <span>9260-6548</span>
                </td>
                <td class="align-middle">
                    <span>Snacks</span>
                </td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Edit</a></td>
                </tr>
                <tr>
                <td>
                    4
                </td>
                <td>CookiesCrack</td>
                <td class="align-middle">
                    <span>InstaDeli</span>
                </td>
                <td class="align-middle">
                    <span>6671-7043</span>
                </td>
                <td class="align-middle">
                    <span>Cookies</span>
                </td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Edit</a></td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>

    
    @push('lib_style')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select.bootstrap4.css') }}">
    @endpush

    @push('lib_script')
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/select.bootstrap4.js') }}"></script>
    @endpush

    @push('page_script')
    <script src="{{ asset('js/modules-datatables.js') }}"></script>
    <script src="{{ asset('js/bootstrap-modal.js') }}"></script>
    @endpush

</x-app-layout>

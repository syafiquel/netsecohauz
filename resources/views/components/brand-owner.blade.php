<x-app-layout>

    <x-slot name="header">
        <div class="section-header">
            <h1>Brand Owner</h1>
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
                <th>Company Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Industry</th>
                <th>PIC Name</th>
                <th>Status</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    1
                </td>
                <td>Food Expert</td>
                <td class="align-middle">
                    <span>food.expert@gmail.com</span>
                </td>
                <td class="align-middle">
                    <span>03-7769043</span>
                </td>
                <td class="align-middle">
                    <span>F&B</span>
                </td>
                <td>Wan Jamal</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Edit</a></td>
                </tr>
                <tr>
                <td>
                    2
                </td>
                <td>MedCure</td>
                <td class="align-middle">
                    <span>med.cure@gmail.com</span>
                </td>
                <td class="align-middle">
                    <span>03-7649417</span>
                </td>
                <td class="align-middle">
                    <span>Pharmacy</span>
                </td>
                <td>Desmond Chong</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Edit</a></td>
                </tr>
                <tr>
                <td>
                    3
                </td>
                <td>PencilPro</td>
                <td class="align-middle">
                    <span>pencil.pro@gmail.com</span>
                </td>
                <td class="align-middle">
                    <span>03-4893170</span>
                </td>
                <td class="align-middle">
                    <span>Book & Stationary</span>
                </td>
                
                <td>Nik Mustaqim</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Edit</a></td>
                </tr>
                <tr>
                <td>
                    4
                </td>
                <td>InstaDeli</td>
                <td class="align-middle">
                    <span>insta.deli@gmail.com</span>
                </td>
                <td class="align-middle">
                    <span>03-7795026</span>
                </td>
                <td class="align-middle">
                    <span>F&B</span>
                </td>
                <td>Nur Fatihah</td>
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

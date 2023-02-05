<x-app-layout>

    <x-slot name="header">
        <div class="section-header">
            <h1>Staff</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="#">Staff</a></div>
            </div>
        </div>
    </x-slot>


    <x-slot name="card_header">
            <div class="card-header-form">
                @livewire('staff.create')     
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
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Joined Date</th>
                <th>Status</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    1
                </td>
                <td>Ahmad Bin Hassan</td>
                <td class="align-middle">
                    <span>ahmad.hassan@gmail.com</span>
                </td>
                <td class="align-middle">
                    <span>Warehouse</span>
                </td>
                <td>11-01-2020</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Edit</a></td>
                </tr>
                <tr>
                <td>
                    2
                </td>
                <td>Siti Hawa</td>
                <td class="align-middle">
                    <span>hawa.siti@gmail.com</span>
                </td>
                <td class="align-middle">
                    <span>Admin</span>
                </td>
                <td>15-04-2020</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Edit</a></td>
                </tr>
                <tr>
                <td>
                    3
                </td>
                <td>Mohd Asri</td>
                <td class="align-middle">
                    <span>asrirock@gmail.com</span>
                </td>
                <td class="align-middle">
                    <span>Production</span>
                </td>
                <td>02-01-2022</td>
                <td><div class="badge badge-success">Active</div></td>
                <td><a href="#" class="btn btn-secondary">Edit</a></td>
                </tr>
                <tr>
                <td>
                    4
                </td>
                <td>Kumar Suresh</td>
                <td class="align-middle">
                    <span>kumarkumar@gmail.com</span>
                </td>
                <td class="align-middle">
                    <span>Production</span>
                </td>
                <td>20-06-2021</td>
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

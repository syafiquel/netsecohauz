<div>
        <ul class="nav nav-tabs" role="tablist">
        @foreach($sections as $key => $section)
            @if( $key == 0 )
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#section{{ $section }}" role="tab"
                >Section {{ $section }}</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#section{{ $section }}" role="tab"
                >Section {{ $section }}</a>
            </li>
            @endif
        @endforeach
        </ul>
    <div class="tab-content">
        @foreach($sections as $key => $section)
            @if( $key == 0 )
            <div class="tab-pane fade show active" id="section{{ $section }}" role="tabpanel">
                <table id="tbl{{ $section }}" class=" responsive rack text-center">
                    <thead>
                        <tr>
                            <td></td>
                            @foreach($columns as $i => $column)
                                <td>{{ $column }}</td>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $j => $row)
                            <tr>
                                <td>{{ $row }}</td>
                            @foreach($columns as $k => $column)
                                @php $is_palette = isset(\App\Models\Racking::where([ 'section' => $section, 'row' => $row, 'column' => $column ])->first()->palette_id) ? true : false @endphp
                                @if(isset($palette_id))
                                    <td id="{{ $section . $row . $column }}" wire:click="cellClicked('{{ $section . '.' . $row . '.' . $column }}')"
                                    style="color:white;{{ $is_palette ? 'background-color:blue;' : 'background-color:red;' }}">
                                    {{ $section . $row . $column }}</td>
                                @else
                                    <td id="{{ $section . $row . $column }}" wire:click="discardCell('{{ $section . '.' . $row . '.' . $column }}')"
                                    style="color:white;{{ $is_palette ? 'background-color:blue;' : 'background-color:red;' }}">
                                    {{ $section . $row . $column }}</td>
                                @endif
                            @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="child" style="width:100%;padding-top: 40px;margin-top: 20px;">
                    <span>Legend</span></div>
            </div>
            @else
            <div class="tab-pane fade" id="section{{ $section }}" role="tabpanel">
                <table id="tbl{{ $section }}" class="rack text-center">
                    <thead>
                        <tr>
                            <td></td>
                            @foreach($columns as $i => $column)
                                <td>{{ $column }}</td>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $j => $row)
                            <tr>
                                <td>{{ $row }}</td>
                            @foreach($columns as $k => $column)
                                <td id="{{ $section . $row . $column }}" wire:click="cellClicked('{{ $section . '.' . $row . '.' . $column }}')" 
                                style="color:white;{{ (\App\Models\Racking::where([ 'section' => $section, 'row' => $row, 'column' => $column ])->first()->palette_id == null) ? 'background-color:blue;' : 'background-color:red;' }}">
                                {{ $section . $row . $column }}</td>
                            @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="child" style="width:100%;padding-top: 40px;margin-top: 20px;">
                    <span>Legend</span></div>    
            </div>
            @endif
        @endforeach
    </div>
</div>

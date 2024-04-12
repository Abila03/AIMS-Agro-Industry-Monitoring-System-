@extends('layouts.app')

@section('title', 'Riwayat Suhu')

@section('content')
    <div class="container mb-5 ">
        <div class="row">
            <h1 class="text-white mb-4">Riwayat Suhu</h1>
            <div class="col-md-3 mb-3">
                <form action="">
                    <select name="" id="filter" onclick="filterSuhu()" class="form-control">
                        <option value="jam">Jam</option>
                        <option value="hari">Hari</option>
                        <option value="bulan">Bulan</option>
                    </select>
                </form>
            </div>
            <div class="col-md-12">
                <div class="table-responsive" id="table">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Suhu</th>
                            </tr>
                        </thead>
                        @foreach ($riwayatSuhu as $data)
                            <tr>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->waktu }}</td>
                                <td>{{ $data->suhu }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{-- Previous Page Link --}}
                            @if ($riwayatSuhu->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $riwayatSuhu->previousPageUrl() }}"
                                        tabindex="-1">Previous</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @for ($i = max(1, $riwayatSuhu->currentPage() - 3); $i <= min($riwayatSuhu->lastPage(), $riwayatSuhu->currentPage() + 3); $i++)
                                @if (is_string($i))
                                    <li class="page-item disabled">
                                        <span class="page-link">{{ $i }}</span>
                                    </li>
                                @else
                                    <li class="page-item {{ $riwayatSuhu->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $riwayatSuhu->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endif
                            @endfor

                            {{-- Next Page Link --}}
                            @if ($riwayatSuhu->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $riwayatSuhu->nextPageUrl() }}">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
            let table = document.getElementById('table')
    
            function filterSuhu() {
                let filter = document.getElementById('filter').value
                if (filter == 'jam') {
                    table.innerHTML = `
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Suhu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>12-01-2023</td>
                                <td>09.00</td>
                                <td>30 <sup>o</sup>C</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>12-01-2023</td>
                                <td>09.00</td>
                                <td>30 <sup>o</sup>C</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>12-01-2023</td>
                                <td>09.00</td>
                                <td>30 <sup>o</sup>C</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>12-01-2023</td>
                                <td>09.00</td>
                                <td>30 <sup>o</sup>C</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>12-01-2023</td>
                                <td>09.00</td>
                                <td>30 <sup>o</sup>C</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>12-01-2023</td>
                                <td>09.00</td>
                                <td>30 <sup>o</sup>C</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>12-01-2023</td>
                                <td>09.00</td>
                                <td>30 <sup>o</sup>C</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>12-01-2023</td>
                                <td>09.00</td>
                                <td>30 <sup>o</sup>C</td>
                            </tr>
                        </tbody>
                    </table>
                    `
                } else if (filter == 'hari') {
                    table.innerHTML = `
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Suhu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Senin</td>
                                <td>12-01-2024</td>
                                <td>27.6</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Selasa</td>
                                <td>13-01-2024</td>
                                <td>27.6</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Rabu</td>
                                <td>14-01-2024</td>
                                <td>27.6</td>
                            </tr>
                        </tbody>
                    </table>
                    `
                } else {
                    table.innerHTML = `
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Suhu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2024</td>
                                    <td>Januari</td>
                                    <td>27.5</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2024</td>
                                    <td>Februari</td>
                                    <td>27.5</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2024</td>
                                    <td>Maret</td>
                                    <td>27.5</td>
                                </tr>
                            </tbody>
                        </table>
                    `
                }
            }
    </script>

@endsection
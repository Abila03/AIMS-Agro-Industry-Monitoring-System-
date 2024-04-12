@extends('layouts.app')
@section('title')
    Riwayat Suhu
@endsection
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
                    <table id="filterJam" class="table table-bordered table-sm">
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
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let jam = document.getElementById('filterJam')
        let hari = document.getElementById('filterHari')
        let bulan = document.getElementById('filterBulan')
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

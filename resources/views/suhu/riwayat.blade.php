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
                <select name="" id="" class="form-control">
                    <option value="" disabled selected>Select Filter</option>
                    <option value="">Jam</option>
                    <option value="">Hari</option>
                    <option value="">Bulan</option>
                </select>
            </form>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
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
            </div>
        </div>
    </div>
</div>
@endsection
@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<div class="main-content">
    <section class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive    ">
                            <table class="table table-striped" id="sortable-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <i class="fas fa-th"></i>
                                        </th>
                                        <th>type transaksi</th>
                                        <th>response code</th>
                                        <th>tanggal</th>
                                        <th>respon message</th>
                                        <th style="display :none">url</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data2 as $d)

                                    <tr>
                                        <td>
                                            {{ $d->id }}
                                        </td>
                                        <td>{{ $d->type_transaksi }}</td>
                                        <td class="align-middle">
                                            {{ $d->response_code }}
                                        </td>
                                        <td>
                                            {{ $d->timestamp }}
                                        </td>
                                        <td>{{ $d->response_message }}</td>
                                        <td style="display: none">
                                            {{ $d->url }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            {{ $data2 -> links() }}
        </div>
    </section>
</div>
@include('template.footer')